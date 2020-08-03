<?php

namespace App\Admin\Controllers;

use App\Model\VideoModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VideoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '视频添加';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new VideoModel());

        $grid->column('id', __('Id'));
        $grid->column('goods_id', __('Goods id'));
        $grid->column('path', __('Path'));
        $grid->column('m3u8', __('M3u8'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(VideoModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('goods_id', __('Goods id'));
        $show->field('path', __('Path'));
        $show->field('m3u8', __('M3u8'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $goods_id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $form = new Form(new VideoModel());
        $form->text('goods_id', __('Goods id'));
        $form->file('path', __('Path'))->uniqueName()->move('video');;

        return $form;
    }




}
