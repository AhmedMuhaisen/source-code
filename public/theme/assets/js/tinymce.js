$(function() {
  'use strict';

  //Tinymce editor
  if ($("#editor").length) {
    tinymce.init({
      selector: '#editor',
      height: 400,
      default_text_color: 'red',
      plugins: ['lists, link, image, media',
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        
      ],
      toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
      toolbar2: 'print preview media | link image media | forecolor backcolor emoticons | codesample help',
      image_advtab: true,
      templates: [{
          title: 'Test template 1',
          content: 'Test 1'
        },
        {
          title: 'Test template 2',
          content: 'Test 2'
        }
      ],
      content_css: []
    });
  }
  
});