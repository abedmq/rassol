<?php

namespace App\Models;

use App\Helpers\Datatable;
use App\Traits\UserGoAuth;
use http\Message;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {

    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use UserGoAuth;
    use Datatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'name', 'email', 'password', 'email_verified_at', 'go_auth', 'field', 'is_go_login', 'imported_at', 'detail_id', 'type', 'sub_user_max',
            'active_at', 'import_id',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden
        = [
            'password',
            'remember_token',
            'two_factor_recovery_codes',
            'two_factor_secret',
        ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts
        = [
            'email_verified_at' => 'datetime',
            'imported_at'       => 'datetime',
            'active_at'         => 'datetime',
            'is_go_login'       => 'boolean',
        ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends
        = [
            'profile_photo_url',
        ];

    function getProfilePhotoUrlAttribute()
    {
        return $this->image;
    }

    function scopeSearch($q)
    {
        $query = request('query')['query'] ?? (request('query') ?: '');

        if ($query)
            $q->where('name', "like", "%$query%")
                ->orwhere('email', 'like', "%$query%")
                ->orwhere('mobile', 'like', "%$query%")
                ->orwhere('id', "$query");
    }

    function scopeAdmin($q)
    {
        $q->where('type', 'admin');
    }

    function scopeActive($q)
    {
//        $q->where('type', 'admin');
    }

    function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_user');
    }


    function groups()
    {
        return $this->belongsToMany(Group::class, "group_user");
    }

    function users()
    {
        return $this->hasMany(User::class, 'admin_id');
    }

    function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }


    function contacts()
    {
        return $this->belongsToMany(Contact::class, "contact_user");
    }

    function detail()
    {
        return $this->hasOne(UserDetail::class);
    }

    function getGroupsManage()
    {
        if ($this->isAdmin())
            return $this->groupsManage()->with('contacts')->get();
        else
        {
            $myGroupAdmin = auth()->user()->groups()->admin()->pluck('id')->toArray();
            return $this->admin->groupsManage()->with('contacts')->whereIn('id', $myGroupAdmin)->get();
        }
//        if ($this->)
//        {
//            return $this->detail->groups()->with('contacts')->get();
//        }
//        return collect([]);
    }

    function getRemainGroupCount()
    {
        return $this->max_groups_manage - $this->getGroupsManage()->count();
    }

    function getMaxGroupsManage()
    {
        if ($this->detail)
        {
            return $this->detail->max_groups_manage ?? 10;
        }
        return 10;
    }

    function canCreateNewGroup()
    {
        return $this->getGroupsManage()->count() < $this->getMaxGroupsManage() && $this->isAdmin();
    }

    function canSendMsg(): bool
    {
        return true;
    }

    function messages()
    {
        return $this->detail ? $this->detail->messages() : (new \App\Models\Message())->where('id', 0);
    }

    function isAdmin()
    {
        return !$this->admin_id;
    }

    function groupsManage()
    {
        return $this->belongsToMany(Group::class, 'user_group_manage', 'user_id');
    }

    function import()
    {
        return $this->belongsTo(Import::class);
    }
}
