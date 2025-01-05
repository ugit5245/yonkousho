<?php

namespace App\Admin\Controllers;

use App\Models\KnowledgeCard;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class KnowledgeCardController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'KnowledgeCard';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new KnowledgeCard());

        $grid->column('id', __('Id'));
        $grid->column('card_title', __('Card title'));
        $grid->column('card_content', __('Card content'));
        $grid->column('source_category_code', __('Source category code'));
        $grid->column('created_at', __('Created at'))->display(function ($time) {
            return date("Y/m/d H:i:s", strtotime($time));
        });
        $grid->column('updated_at', __('Updated at'))->display(function ($time) {
            return date("Y/m/d H:i:s", strtotime($time));
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
        $show = new Show(KnowledgeCard::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('card_title', __('Card title'));
        $show->field('card_content', __('Card content'));
        $show->field('source_category_code', __('Source category code'));
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
        $form = new Form(new KnowledgeCard());

        $form->textarea('card_title', __('Card title'));
        $form->textarea('card_content', __('Card content'));
        $form->number('source_category_code', __('Source category code'));

        return $form;
    }
}
