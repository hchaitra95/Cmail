<!--Header-part-->
<div id="header">
  <h1>C-Mail</h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text"><?php print $_SESSION['email'];?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="profile.php"><i class="icon-user"></i> My Profile</a></li>
       <li class="divider"></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
  
     <li  class="dropdown" id="settings" ><a title="" href="#" data-toggle="dropdown" data-target="#settings" class="dropdown-toggle"><i class="icon icon-cog"></i>  <span class="text">Settings</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
          <li><a href="pwdchange.php"><i class="icon-lock"></i>Change Password</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 