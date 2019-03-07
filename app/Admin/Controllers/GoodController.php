<?php

namespace App\Admin\Controllers;

use App\Models\Good;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class GoodController extends Controller
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
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
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
        $grid = new Grid(new Good);
        $grid->id('Id');
        $grid->name('Name');
        $grid->jancode('jancode');
        $grid->price('Price');
        $grid->height('Height');
        $grid->width('Width');
        $grid->images()->goods_image_url('Image')->image();

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
        $show = new Show(Good::findOrFail($id));

        $show->id('Id');
        $show->height('Height');
        $show->width('Width');
        $show->price('Price');
        $show->images( function ($image){
          $image->goods_image_url('Image')->image();
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
      $form = new Form(new Good);

      $form->text('name', 'Name')->rules('required');
      $form->text('jancode', 'Jancode')->rules('required');
      $form->number('height', 'Height')->rules('required');
      $form->number('width', 'Width')->rules('required');
      $form->number('price', 'Price')->rules('required');
      $form->image('images.goods_image_url', 'Image');

      return $form;
    }
}
