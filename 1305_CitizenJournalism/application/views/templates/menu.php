<?php if($this->session->userdata('fname')==false){ ?>
	
<div class="wrapper row2">
  <nav id="topnav">
    <ul class="clear">
      <li class="active"><a href="<?php echo base_url().'index.php/news'; ?>"" title="Homepage">Homepage</a></li>
	  
      <li><a class="drop" href="<?php echo base_url().'index.php/news/archives'; ?>" title="News">News</a>
        <ul>
          <li><a href="<?php echo base_url().'index.php/news/archives'; ?>" title="Archives">Archives</a></li>
          <li><a href="<?php echo base_url().'index.php/news/headlines'; ?>" title="Headlines">Headlines</a></li>
        </ul>
      </li>
      <li><a class="drop" href="<?php echo base_url().'index.php/forum'; ?>" title="Forms">Forums</a>
        <ul>
          <li><a href="<?php echo base_url().'index.php/forum'; ?>" title="View Forums">View Forums</a></li>
          <li><a href="<?php echo base_url().'index.php/forum/upload'; ?>" title="Start Q&A">Start Q&A</a></li>
        </ul>
      </li>
	 
       <li><a class="drop" href="<?php echo base_url().'index.php/news/search?q=general'; ?>" title="Forms">Category</a>
        <ul>
          <li><a href="<?php echo base_url().'index.php/news/search?q=state'; ?>" title="View Forums">State</a></li>
          <li><a href="<?php echo base_url().'index.php/news/search?q=nation'; ?>" title="View Forums">Nation</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=sports'; ?>" title="View Forums">Sports</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=life'; ?>" title="View Forums">Life</a></li>
          <li><a href="<?php echo base_url().'index.php/news/search?q=politics'; ?>" title="View Forums">Politics</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=education'; ?>" title="View Forums">Education</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=local'; ?>" title="View Forums">Local</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=general'; ?>" title="View Forums">General</a></li>
        </ul>
      </li>
	  
	  <li><a class="drop" href="#" title="Account">Account</a>
        <ul>
          <li><a href="<?php echo base_url().'index.php/login'; ?>" title="Login">Login</a></li>
          <li><a href="<?php echo base_url().'index.php/api/regis'; ?>" title="Sign Up">Sign Up</a></li>
        </ul>
      </li>
         <li><a href="<?php echo base_url().'index.php/news/upload'; ?>" title="Upload">Upload</a></li> 
	  
    </ul>
  </nav>
</div>

	<!--
	<a href="<?php echo base_url().'index.php/news'; ?>">HOME</a>
	<a href="<?php echo base_url().'index.php/news/upload'; ?>">UPLOAD</a>
	<a href="<?php echo base_url().'index.php/news/archives'; ?>">ARCHIVES</a>
	<a href="<?php echo base_url().'index.php/news/headlines'; ?>">HEADLINES</a>
	<a href="<?php echo base_url().'index.php/forum'; ?>">FORUMS</a>
	<a href="<?php echo base_url().'index.php/forum/upload'; ?>">START QA</a>
	<a href="<?php echo base_url().'index.php/login'; ?>">LOGIN</a>
	<a href="<?php echo base_url().'index.php/login'; ?>">REGISTER</a>

	-->
<?php } ?>

<?php if($this->session->userdata('fname')==true && $this->session->userdata('role')=="admin"){ ?>

	<div class="wrapper row2">
  <nav id="topnav">
    <ul class="clear">
      <li class="active"><a href="<?php echo base_url().'index.php/news'; ?>"" title="Homepage">Homepage</a></li>
	  
      <li><a class="drop" href="<?php echo base_url().'index.php/news/archives'; ?>" title="News">News</a>
        <ul>
          <li><a href="<?php echo base_url().'index.php/news/archives'; ?>" title="Archives">Archives</a></li>
          <li><a href="<?php echo base_url().'index.php/news/headlines'; ?>" title="Headlines">Headlines</a></li>
        </ul>
      </li>
      <li><a class="drop" href="<?php echo base_url().'index.php/forum'; ?>" title="Forms">Forums</a>
        <ul>
          <li><a href="<?php echo base_url().'index.php/forum'; ?>" title="View Forums">View Forums</a></li>
          <li><a href="<?php echo base_url().'index.php/forum/upload'; ?>" title="Start Q&A">Start Q&A</a></li>
        </ul>
      </li>
	  
	 
       <li><a class="drop" href="<?php echo base_url().'index.php/news/search?q=general'; ?>" title="Forms">Category</a>
        <ul>
          <li><a href="<?php echo base_url().'index.php/news/search?q=state'; ?>" title="View Forums">State</a></li>
          <li><a href="<?php echo base_url().'index.php/news/search?q=nation'; ?>" title="View Forums">Nation</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=sports'; ?>" title="View Forums">Sports</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=life'; ?>" title="View Forums">Life</a></li>
          <li><a href="<?php echo base_url().'index.php/news/search?q=politics'; ?>" title="View Forums">Politics</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=education'; ?>" title="View Forums">Education</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=local'; ?>" title="View Forums">Local</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=general'; ?>" title="View Forums">General</a></li>
        </ul>
      </li>
	  <li><a href="<?php echo base_url().'index.php/news/moderate'; ?>" title="Moderate">Moderate</a></li>
	  <li><a href="<?php echo base_url().'index.php/news/manageReported'; ?>" title="Moderate">Reported Articles</a></li>
	  <li><a href="<?php echo base_url().'index.php/news/upload'; ?>" title="Upload">Upload</a></li>
	  <li><a href="<?php echo base_url().'index.php/news/manageAds'; ?>" title="ads">Manage Ads</a></li>
	  <li><a href="<?php echo base_url().'index.php/news/showProfile'; ?>" title="Profile">Profile</a></li>
	  <li><a href="<?php echo base_url().'index.php/login/logout'; ?>" title="Sign Up">Logout (<?php echo $this->session->userdata('fname'); ?>)</a></li>
    </ul>
  </nav>
</div>

<!--
	<a href="<?php echo base_url().'index.php/news'; ?>">HOME</a>
	<a href="<?php echo base_url().'index.php/news/upload'; ?>">UPLOAD</a>
	<a href="<?php echo base_url().'index.php/news/moderate'; ?>">MODERATE</a>
	<a href="<?php echo base_url().'index.php/news/archives'; ?>">ARCHIVES</a>
	<a href="<?php echo base_url().'index.php/news/headlines'; ?>">HEADLINES</a>
	<a href="<?php echo base_url().'index.php/forum'; ?>">FORUMS</a>
	<a href="<?php echo base_url().'index.php/forum/upload'; ?>">START QA</a>
	<a href="<?php echo base_url().'index.php/news/moderate'; ?>">PROFILE</a>
	<a href="<?php echo base_url().'index.php/login/logout'; ?>">LOGOUT</a>
	
-->

<?php } ?>

<?php if($this->session->userdata('fname')==true && $this->session->userdata('role')!="admin"){ ?>

	<div class="wrapper row2">
  <nav id="topnav">
    <ul class="clear">
      <li class="active"><a href="<?php echo base_url().'index.php/news'; ?>"" title="Homepage">Homepage</a></li>
	  
      <li><a class="drop" href="<?php echo base_url().'index.php/news/archives'; ?>" title="News">News</a>
        <ul>
          <li><a href="<?php echo base_url().'index.php/news/archives'; ?>" title="Archives">Archives</a></li>
          <li><a href="<?php echo base_url().'index.php/news/headlines'; ?>" title="Headlines">Headlines</a></li>
        </ul>
      </li>
      <li><a class="drop" href="<?php echo base_url().'index.php/forum'; ?>" title="Forms">Forums</a>
        <ul>
          <li><a href="<?php echo base_url().'index.php/forum'; ?>" title="View Forums">View Forums</a></li>
          <li><a href="<?php echo base_url().'index.php/forum/upload'; ?>" title="Start Q&A">Start Q&A</a></li>
        </ul>
      </li>
	  
	 
       <li><a class="drop" href="<?php echo base_url().'index.php/news/search?q=general'; ?>" title="Forms">Category</a>
        <ul>
          <li><a href="<?php echo base_url().'index.php/news/search?q=state'; ?>" title="View Forums">State</a></li>
          <li><a href="<?php echo base_url().'index.php/news/search?q=nation'; ?>" title="View Forums">Nation</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=sports'; ?>" title="View Forums">Sports</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=life'; ?>" title="View Forums">Life</a></li>
          <li><a href="<?php echo base_url().'index.php/news/search?q=politics'; ?>" title="View Forums">Politics</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=education'; ?>" title="View Forums">Education</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=local'; ?>" title="View Forums">Local</a></li>
		  <li><a href="<?php echo base_url().'index.php/news/search?q=general'; ?>" title="View Forums">General</a></li>
        </ul>
      </li>
      <li><a href="<?php echo base_url().'index.php/news/managePosts/'.$this->session->userdata('m_id') ; ?>" title="Upload">Manage Posts</a></li>
	  <li><a href="<?php echo base_url().'index.php/news/upload'; ?>" title="Upload">Upload</a></li>
	  <li><a href="<?php echo base_url().'index.php/news/showProfile'; ?>" title="Profile">Profile</a></li>
	  
	  <li><a href="<?php echo base_url().'index.php/login/logout'; ?>" title="Sign Up">Logout (<?php echo $this->session->userdata('fname'); ?>)</a></li>
    </ul>
  </nav>
</div>

<!--	<a href="<?php echo base_url().'index.php/news'; ?>">HOME</a>
	<a href="<?php echo base_url().'index.php/news/upload'; ?>">UPLOAD</a>
	<a href="<?php echo base_url().'index.php/news/managePosts/'.$this->session->userdata('m_id') ; ?>">MANAGE POSTS</a>
	<a href="<?php echo base_url().'index.php/news/archives'; ?>">ARCHIVES</a>
	<a href="<?php echo base_url().'index.php/news/headlines'; ?>">HEADLINES</a>
	<a href="<?php echo base_url().'index.php/forum'; ?>">FORUMS</a>
	<a href="<?php echo base_url().'index.php/forum/upload'; ?>">START QA</a>
	<a href="<?php echo base_url().'index.php/login/logout'; ?>">LOGOUT</a>
	-->

<?php } ?>

        
        