<?php

namespace App\Admin\Controllers;

use App\Models\Book;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BookController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Book';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Book());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'))->image();
        $grid->column('question_title_visible', __('設問タイトル表示非表示'));
        $grid->column('book_name', __('Book name'));
        $grid->column('exam_name', __('Exam name'));
        $grid->column('book_version', __('Book version'));
        $grid->column('book_publisher', __('Book publisher'));
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
        $show = new Show(Book::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image', __('Image'))->image();
        $show->field('book_name', __('Book name'));
        $show->field('exam_name', __('Exam name'));
        $show->field('book_version', __('Book version'));
        $show->field('book_publisher', __('Book publisher'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('question_title_visible', __('設問タイトル表示非表示'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Book());

        $form->text('book_name', __('Book name'));
        $form->text('exam_name', __('Exam name'));
        $form->number('book_version', __('Book version'));
        $form->text('book_publisher', __('Book publisher'));
        $form->image('image', __('Image'));
        $form->number('question_title_visible', __('設問タイトル表示非表示'));

        return $form;
    }
}
