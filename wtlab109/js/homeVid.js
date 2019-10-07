$(document).ready(function(){
	$(".ez-vidset").each(function(){
		console.log($(this).children(".ez-video-grid"));
		getVids($(this).children(".ez-video-grid"), $(this).attr("seriesName"));
	})

});

//ask for videos of the series
function getVids(grid, seriesName){
	$.ajax({
		url: 'php/latestVid.php',
		type: "POST",
		dataType: 'json',
		data: {"seriesName": seriesName},
		success:
			function(vids){
				showSet(grid, vids);
			},
		error:
			function(jqXHR, textStatus, errorThrown){
				console.log( errorThrown);
			}
	});
}

function showSet(grid, vids){
	var maxVidNums = 5;
	for(var i = 0; i < maxVidNums; i++){
		try {
			var gridItem = createGridItem(vids[i]);
		} catch (e) {
			break;
		}
		console.log(grid);
		grid.append(gridItem);
	}
}

function createGridItem(vid){
	var item = $("<div class='ez-grid-item'><a><img id='img' alt='video'><div class='ez-vid-title'><p></p></div></a></div>");
	var temp = $("<div class='ez-grid-item'><a><img id='img' alt='video'><div class='ez-vid-title'><p></p></div></a></div>");
	item.find("img").attr("src", "https://img.youtube.com/vi/" + vid.id + "/mqdefault.jpg");
	item.find("p").text(vid.title);

	return item;
}

function searchKey(){
	var input = document.getElementById("keyword").value;
	if(input == ""){
		window.alert("please enter a search value!");
		return false;
	}
}
