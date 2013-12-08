 <div id="addmydiv">
    <div id="add" class="rounded">
        <form name="form" action="javascript:insert()" method="post" >
			<div id="enter_chat">
            <textarea type="text" maxlength="255" id="text" class="rounded" name="text"></textarea>
            
            <input id="chat"  class="rounded" name="chat" type="hidden" value="<?php echo $_SESSION['username']; ?>"/>
			<span id="">Limit: 255 Characters.</span>
			</div>
			<div id="enter">
            <span id="hit_enter_">Hit "ENTER"<br />to submit.</span>
            <input id="" class="rounded btn" type="submit" value="Enter" name="submit" onclick="clearit()" />
			</div>
		
        </form>   
 
    </div>
        <div id="insert_response"></div>
        <div id="mydiv"><p><em>Loading ...</em></p></div>
    </div>
 