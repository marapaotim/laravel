<table  id="tblMessage" class="table table-striped table-bordered">
  <thead>
    <tr> 
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Message</th>  
      <th>Action</th>  
    </tr>
  </thead>
  <tbody>
    {foreach from=$people key=key item=i} 
      <tr>   
        <td>{$i.id}</td> 
        <td>{$i.name}</td> 
        <td>{$i.email}</td> 
        <td>{$i.message}</td> 
        <td><a href="#" onclick="retrieveData({$i.id},'{$i.name}','{$i.email}','{$i.message}'); return false;">Edit</a> | <a href="#" onclick="deleteMessage({$i.id}); return false;">Delete</a></td>   
      </tr>
    {/foreach} 
</tbody>
</table>  
  <!--{for $foo=1 to $to}
     <a href="#" onclick="paginate_message({$foo}); return false;" class="btn btn-primary">{$foo}</a>
  {/for} -->