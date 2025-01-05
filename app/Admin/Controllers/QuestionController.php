<?php

namespace App\Admin\Controllers;

use App\Models\question;
use App\Models\KnowledgeCard;
use App\Models\Book;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuestionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Question';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new question());

        $grid->column('id', __('Id'));
        $grid->column('book_page', __('Book page'));
        $grid->column('question_number', __('Question number'));
        $grid->column('question_title', __('Question title'));
        $grid->column('question_content', __('Question content'));
        $grid->column('recommended_approach', __('Recommended approach'));
        $grid->column('created_at', __('Created at'))->display(function ($time) {
            return date("Y/m/d H:i:s", strtotime($time));
        });
        $grid->column('updated_at', __('Updated at'))->display(function ($time) {
            return date("Y/m/d H:i:s", strtotime($time));
        });
        $grid->column('book.name', __('Book name'));

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
        $show = new Show(question::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('book_page', __('Book page'));
        $show->field('question_number', __('Question number'));
        $show->field('question_title', __('Question title'));
        $show->field('question_content', __('Question content'));
        $show->field('recommended_approach', __('Recommended approach'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('book.name', __('Book name'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new question());

        $form->number('book_page', __('Book page'));
        $form->textarea('question_number', __('Question number'));
        $form->textarea('question_title', __('Question title'));
        $form->textarea('question_content', __('Question content'));
        $form->textarea('recommended_approach', __('Recommended approach'));
       $form->select('book_id', __('Book name'))->options(Book::all()->pluck('book_name', 'id'));

        return $form;
    }
}
