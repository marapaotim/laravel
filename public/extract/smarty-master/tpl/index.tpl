{include file="menu.tpl"}
<div class="container-fluid">
<center><h3><u>Welcome to Guestbook Application</u></h3></center>
<hr> 

      <div class="row">
        <div class="col-md-6 col-sm-6">
          <form method="post" id="myform"> 
            <div class="alert alert-success alert-dismissable" style="display:none;"></div>
            <div class="form-group">
              <label for="message">Name</label>
              <input type="text" name="fname" id="fname" class="form-control" placeholder="Full name" required>
            </div>  
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea name="message" class="form-control" id="message" placeholder="Message Us" rows="6" required></textarea>
            </div>    
            <input type="submit" id="submit" class="btn btn-primary" value="SAVE">  
          </form> 
        </div>
        <div class="col-md-6 col-sm-6">
          <div id="myTable">
            {include file="message_list.tpl"}
          </div>
        </div>    
      </div> 
  </div>
{include file="footer.tpl"}
