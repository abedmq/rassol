<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Libraries\CustomResponse;
use App\Models\User;
use Yajra\DataTables\DataTables;

class BaseController extends Controller {


    private   $data       = [];
    protected $modelClass = '';
    protected $model;
    protected $title      = '';
    protected $route      = '';
    protected $viewFolder = '';
    protected $prefix     = 'admin.';

    public function __construct()
    {
        $this->data['title']  = $this->title;
        $this->data['route']  = $this->route;
        $this->data['prefix'] = $this->prefix;
        if (!$this->viewFolder)
            $this->viewFolder = $this->route;
        $this->getModel();
    }

    public function response($rs = [], $httpCode = 200): CustomResponse
    {
        return parent::response(array_merge($this->data, $rs), $httpCode);
    }

    function index($query = null)
    {
        if (!$query)
        {
            $query = $this->model->query();
        }

        if (method_exists($this->model, 'scopeSearch'))
            $query->search();
        if (\request()->ajax())
            return $query->datatable();
        return view($this->prefix . $this->viewFolder . '.index', $this->data);
    }


    public function destroy($id)
    {
        $item = $this->model->findOrFail($id);

        if (method_exists($item, 'deleteItem'))
        {
            $item->deleteItem();
        } else
        {
            $item->delete();
        }
        return $this->response()->success('تم الحذف بنجاح');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->response()->view($this->prefix . $this->route . '.create');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item=$this->model->findOrFail($id);
        return $this->response()->view($this->prefix . $this->route . '.edit',compact('item'));
    }

    function saveData($data, $item = null)
    {
        if (!$item)
            $model = $this->model;
        elseif (is_int($item))
            $model = $this->model->find($item) ?: $this->model;
        else
            $model = $item;
        $model->fill($data);
        $model->save();
        return $this->response()->success('تم الحفظ بنجاح')->with('clear', 'no');
    }

    function getModel()
    {
        if (!$this->modelClass)
            throw new \Exception('no model');
        $this->model = new $this->modelClass();
        return $this->model;
    }
}
