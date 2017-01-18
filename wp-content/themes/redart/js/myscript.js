jQuery(document).ready(function(){

	var myPlaylist = new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_N",
		cssSelectorAncestor: "#jp_container_N"
	},
        {
		playlistOptions: {
                    enableRemoveControls: false
		},
		supplied: "mp3",
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true,
		audioFullScreen: true
	});
        
        jQuery.ajax({
	          url: ajaxurl,
	          type: 'post',
	          data: {
	            action : "get_music",         
	          },
	          success: function (data) {
	          	//console.log();
	          	var music = JSON.parse(data);
                        console.log(music);
                        var playlist = [];
                        for (var i = 0; i < music.length; i++) {
                            playlist.push(
                                    {
                                        title : music[i][0],
                                        mp3 : music[i][1]
                                    }
                                  );
                        }
                        myPlaylist.setPlaylist(playlist);
                        myPlaylist.play();
	          },
	          error: function (xhr, ajaxOptions, thrownError) {
	                console.log(xhr.status);
	                console.log(xhr.responseText);
	                console.log(thrownError);
	            },
	            beforeSend : function(){
	            	//alert('salut');
	            },
	            complete : function(){
	            	//alert('fin');
	            }
	        });
});