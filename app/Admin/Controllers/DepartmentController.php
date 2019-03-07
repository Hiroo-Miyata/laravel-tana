<?php

namespace App\Admin\Controllers;

use App\Models\Department;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DepartmentController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        $array = [];
        $goodObjectDic = [];
        $furniture = Department::find($id)->furniture;
        foreach ($furniture as $furni){
          $shelve = $furni->shelve;
          $shelfarray = [];
          foreach ($shelve as $shelf ) {
            $goods = $shelf->goods;
            $goodarray = [];
            foreach ($goods as $good){
              $image = $good->images()->first()->toArray();
              $good = $good->toArray();
              $good = $good + $image;
              $goodObjectDic[$good["id"]] = $good;
              // array_push($good->toArray(), $image->goods_image_url);
              array_push($goodarray, $good["id"]);
              array_push($goodarray, 1);
            }
            array_push($shelfarray, $goodarray);
          }
          array_push($array, $shelfarray);
        }
        return view('admin.department.edit2')->with(array('array'=> $array, 'goodObjectDic'=> $goodObjectDic));
        // return  $content
        //     ->header('売り場編集')
        //     ->body(view('admin.department.edit2'));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Department);

        $grid->id('Id');
        $grid->department_name('Department name');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('department_name', 'Department name');
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Department::findOrFail($id));

        $show->id('Id');
        $show->department_name('Department name');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Department);

        $form->text('department_name', 'Department name');

        return $form;
    }
}
