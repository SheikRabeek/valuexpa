<template lang="html">
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
         <center><b><h4> <p style="color: #1c214d;">Before you leave!</p></h4></b></center><br>
         <center><b><h3> <p style="color: #1c214d;"> Unlock a World of Insights!</p> </h3></b></center>
          <center><p style="color: #1c214d;">Stay informed with the latest industry insights 
and join an empowering community. </p></center><br>
<center><b>Sign up for our Newsletter to be in the know!</b></center>
	<div class="container1">
		<form action="submail.php" method="POST" style="background-color: #EEEEEE;">
			<label for="email"></label>
			<input type="email" name="email" style="background-color: #F0F0F0;" id="email" placeholder="Enter your email address" required>
			<input type="submit" value="Subscribe">
		</form>
	</div>
  </div>
<center><p>Plus, receive a FREE e-book packed with insider 
knowledge as a thank-you for joining us!</p></center>
       </div>
        
     </div>
      
   </div>
<hr>

<h2 style="text-align:center;color:#444444">Get Regular Insights from our Newsletter</h2>
<div class="container" style="	display: flex;
			flex-direction: column;
			align-items: center;
			
			padding: 20px;
			box-sizing: border-box;">
		
		<form action="submail.php" method="POST" style="background-color: #EEEEEE;display: flex;
			flex-direction: column;
			align-items: center;
			background-color: #CCCCCC;
			padding: 20px;
			box-sizing: border-box;
			width: 100%;
			max-width: 679px;
			border-radius: 10px;">
			<label for="email"></label>
			<input type="email" name="email" id="email" placeholder="Enter your email address" required style="width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border-radius: 5px;
			border: none;">
			<input type="submit" value="Subscribe" style="width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: none;
			background-color: #042550;
			color: #FFFFFF;
			font-weight: bold;
			cursor: pointer;">
		</form>
	</div>
    <div>
        <div class="container-fluid contact-footer">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center">
                    <h1 class="text-light p-3">Have a Question?</h1>
                     <div class="btn btn-light px-3" @click="track()"><a href="/contact-us">Contact Us</a></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "ContactFooter",

    // methods: {
    //     track () {
    //         console.log('clicked')
    //         this.$gtag.event('latest-release-click', {
    //             'event_category': 'docs',
    //             'event_label': 'Latest Release btn clicked',
    //             'value': 1
    //         })
    //     }
    // }
}
</script>


<style lang="">

</style>

