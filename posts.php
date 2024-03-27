 <?php

 	class Post
 	{
 		private $error=" ";
 		public function create_post($userid,$data,$grade,$post_type)
 		{
 			if(!empty($data))
 			{
				$con = mysqli_connect("localhost", "root", "", "skyinfo_db");
 				//$post=addslashes($data['post']);
				$postid=create_postid();
				 $sql="insert into posts(user_id,post_id,post,has_image,pt_type) values('$userid','$postid','$data','$grade','$post_type')";
				 mysqli_query($con,$sql);

 			}else
 			{

 				$this->error ="Plese type something to post!<br>"; 

 			}
 			return $this->error;
 		}
 		public function get_posts()
 		{
 			$con = mysqli_connect("localhost", "root", "", "lord");		
			// If 'type' parameter is not specified, retrieve all posts
			$sql = "SELECT * FROM  work_provide ORDER BY id desc";
			$result=mysqli_query($con,$sql);
				
				



		    if($result)
		    {
		    	if($result && mysqli_num_rows($result)>0)
		    	{

		    		//$data =mysqli_fetch_assoc($result);

				    if($result)
					{
						return $result;
					}
					else
					{
						return false;
					}
		    	}


		    }
 		}	
		
		
		 public function get_posts1()
 		{
 			$con = mysqli_connect("localhost", "root", "", "lord");		
			// If 'type' parameter is not specified, retrieve all posts
			$sql = "SELECT * FROM  work_seek ORDER BY id desc";
			$result=mysqli_query($con,$sql);
				
				



		    if($result)
		    {
		    	if($result && mysqli_num_rows($result)>0)
		    	{

		    		//$data =mysqli_fetch_assoc($result);

				    if($result)
					{
						return $result;
					}
					else
					{
						return false;
					}
		    	}


		    }
 		}		

 }
 
?>