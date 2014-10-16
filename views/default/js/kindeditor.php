elgg.provide('elgg.kindeditor');


elgg.kindeditor.init = function(){
 	prettyPrint();
}



elgg.register_hook_handler('init', 'system', elgg.kindeditor.init);