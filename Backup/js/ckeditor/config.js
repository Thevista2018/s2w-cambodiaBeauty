/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
    config.toolbar = 'Desc';

    /* -- Toolbar - Desc */
    config.toolbar_Desc =
    [
        { name: 'document', items : [ 'Source','-','NewPage','Preview' ] },
        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
        { name: 'editing', items : [ 'Find','Replace','-','SelectAll' ] },
        { name: 'insert', items : [ 'SpecialChar','Maximize' ] },
        '/',
        { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
        '/',
        { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
        { name: 'colors', items : [ 'TextColor','BGColor' ] },
    ];
    
    /* -- Toolbar - Desc_img */
    config.toolbar_Desc_img =
    [
        { name: 'document', items : [ 'Source','-','NewPage','Preview' ] },
        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
        { name: 'editing', items : [ 'Find','Replace','-','SelectAll' ] },
        { name: 'insert', items : [ 'Image','SpecialChar','Maximize' ] },
        '/',
        { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
        '/',
        { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
        { name: 'colors', items : [ 'TextColor','BGColor' ] },
    ];    

    /* -- Toolbar - Portal */
    config.toolbar_Portal =
    [
        { name: 'document', items : [ 'Source','-','NewPage','Preview' ] },
        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
        { name: 'editing', items : [ 'Find','Replace','-','SelectAll' ] },
        { name: 'insert', items : [ 'Image','Flash','SpecialChar','Table','HorizontalRule' ] },
        '/',
        { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
        '/',
        { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
        { name: 'colors', items : [ 'TextColor','BGColor' ] },
        { name: 'tools', items : [ 'Maximize' ] }
    ];

    /* -- Toolbar - Full */
    config.toolbar_Full =
    [
        { name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
        { name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
        '/',
        { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','- ','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
        { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
        '/',
        { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
        { name: 'colors', items : [ 'TextColor','BGColor' ] },
        { name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
    ];

    /* -- Toolbar - Basic */
    config.toolbar_Basic =
    [
        ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About']
    ];

    /* -- Config - Resize */
//    config.resize_enabled = false;
    config.resize_minWidth = 570;
    config.resize_maxWidth = 680;
    config.resize_minHeight = 300;
    config.resize_maxHeight = 700;

    /* -- Config - Smiley */
    config.smiley_columns = 6 ;

    //ระบุพาธที่เก็บรูปภาพ
    config.smiley_path = '/images/smiley/';

    // ใส่ชื่อรูปภาพ
    config.smiley_images = [
        'angry.png','bat.png','beer.png','biggrin.png','cake.png','camera.png','cat.png','clock.png','cocktail.png','confused.png','cry.png','cup.png','dog.png',
        'email.png','embarassed.png','film.png','kiss.png','lightbulb.png','love.png','note.png','oh.png','omg.png','phone.png','present.png','rose.png','sad.png',
        'shade.png','sleep.png','smile.png','star.png','teeth.png','thumbs_down.png','thumbs_up.png','tongue.png','unhappy.png','unlove.png','wilted_rose.png','wink.png'
    ];

    //ใส่ชื่อหรือสัญลักษณ์อธิบายภาพ
    config.smiley_descriptions = [
        'angry.png','bat.png','beer.png','biggrin.png','cake.png','camera.png','cat.png','clock.png','cocktail.png','confused.png','cry.png','cup.png','dog.png',
        'email.png','embarassed.png','film.png','kiss.png','lightbulb.png','love.png','note.png','oh.png','omg.png','phone.png','present.png','rose.png','sad.png',
        'shade.png','sleep.png','smile.png','star.png','teeth.png','thumbs_down.png','thumbs_up.png','tongue.png','unhappy.png','unlove.png','wilted_rose.png','wink.png'
    ];

};