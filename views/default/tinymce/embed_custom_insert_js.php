	if (window.KindEditor) {
		var editor = window.KindEditor.get(textAreaId);

		if (editor) {

			// work around for IE/TinyMCE bug where TinyMCE loses insert carot
			if ($.browser.msie) {
				editor.focus();
				editor.selection.moveToBookmark(elgg.tinymce.bookmark);
			}

			editor.execCommand("mceInsertContent", true, content);
		}
	}
