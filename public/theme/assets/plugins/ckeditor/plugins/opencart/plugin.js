CKEDITOR.plugins.add('petzania', {
	init: function(editor) {
		editor.addCommand('petzania', {
			exec: function(editor) {
				$('#modal-image').remove();

				$.ajax({
					url: '' + '&ckeditor=' + editor.name,
					dataType: 'html',
					success: function(html) {
						$('body').append(html);

						$('#modal-image').modal('show');
					}
				});
			}
		});

		editor.ui.addButton('petzania', {
			label: 'petzania',
			command: 'petzania',
			icon: this.path + 'images/icon.png'
		});
	}
});
