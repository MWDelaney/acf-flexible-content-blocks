function appendAce( $el ) {
	jQuery( $el ).each(function () {
			var textarea = jQuery(this);
			var mode = textarea.data('editor');
			var editDiv = jQuery('<div>', {
					position: 'absolute',
					width: '100%',
					height: textarea.closest('.acf-field').height(),
					'class': textarea.attr('class')
			}).insertBefore(textarea);
			textarea.css('display', 'none');
			var editor = ace.edit(editDiv[0]);
			editor.renderer.setShowGutter(true);
			editor.getSession().setValue(textarea.val());
			editor.getSession().setMode("ace/mode/html");
			editor.setTheme("ace/theme/ambiance");
			// editor.setTheme("ace/theme/idle_fingers");

			// copy back to textarea on form submit...
			textarea.closest('form').submit(function () {
					textarea.val(editor.getSession().getValue());
			})
	});
}

jQuery( document ).ready(function() {


	 appendAce('.acf-code textarea');

});

/**
 * Hide Dev Mode items, append Dev Mode button
 */
acf.add_action('append', function( $el ){
	appendAce('.acf-code textarea');
})
