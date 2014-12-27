<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style type="text/css">
            .form-row{
                width: 500px;
                min-height:50px;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                color: #3a89a3;
                height: auto;
                border-radius: 4px;
                margin: 10px;
                padding-left: 40px;
            }
            textarea {
                width: 93%;
                height: 90px; 

            }
        </style>
        <title>Иерархия классов элементов HTML форм</title>
    </head>
    <body>


        <?php
        include_once 'lib/baseElement.class.php';
        $textAttr = array('name' => 'title', 'placeholder' => 'title');
        $textareaAttr = array('name' => 'text', 'placeholder' => 'very-very long text');
        $checkAttr = array('name' => 'match', 'value' => 'one', 'checked' => 'checked');
        $checkAttr1 = array('name' => 'match', 'value' => 'two');
        $radioAttr = array('name' => 'radio', 'value' => 'one');
        $radioAttr1 = array('name' => 'radio', 'value' => 'two');
        $options = array('one' => 'ONE Option', 'two' => 'TWO Option');
        $submitAttr = array('name' => 'update', 'value' => 'жмяк!');
        $title = new formInput('text');
        $title->setAttributes($textAttr);
        $description = new formTextarea($textareaAttr);
        $select = new formSelect($options);
        $select->addAttribute('name', 'choose');
        $select->addOption('three', 'THREE Option');
        $select->remapOptionValue('one', 'один');
        $check = new formInput('checkbox');
        $check->setAttributes($checkAttr);
        $check1 = new formInput('checkbox');
        $check1->setAttributes($checkAttr1);
        $radio = new formInput('radio');
        $radio->setAttributes($radioAttr);
        $radio1 = new formInput('radio');
        $radio1->setAttributes($radioAttr1);
        $submit = new formInput('submit');
        $submit->setAttributes($submitAttr);
        ?>

        <div class="form">
            <form action="index.php" method="post">
                <div class="form-row">
                    <label for="title">Title:</label><?php $title->render(); ?>
                </div>
                <div class="form-row">
                    <label for="text">Text:</label><?php $description->render(); ?>
                </div>
                <div class="form-row">
                    <label>Select:</label><?php $select->render(); ?>
                </div>
                <div class="form-row">
                    <label>Match:</label><?php $check->renderChoise() . $check1->renderChoise(); ?>
                </div>
                <div class="form-row">
                    <label>Radio:</label><?php $radio->renderChoise() . $radio1->renderChoise(); ?>
                </div>
                <div class="form-row">
                    <?php $submit->render(); ?>
                </div>
            </form>
        </div>    
    </body>
</html>
