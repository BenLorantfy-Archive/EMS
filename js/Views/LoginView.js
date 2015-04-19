App.Views.LoginView = App.Views.SectionView.extend({
	
	events: {
		"click .button" : "login",
		"keyup .credential" : "enterLogin"
	},
	
	enterLogin: function(e){
		//
		// If user pressed enter within a credential box, login user
		//
		if(e.keyCode == 13){
			this.login();
		}
	},
	
	login: function(){
		//
		// Save this reference to variable
		//
		var view = this;
		
		//
		// Get username and password from login view
		//
		var username = this.$el.find(".username").val();
		var password = this.$el.find(".password").val();
		
		//
		// Create a session on server with username and password
		//
		$.ajax({
		    url: '/session',
		    type: 'POST',
		    data:JSON.stringify({
			     username:username
			    ,password:password
		    }),
		    dataType:"json",
		    success: function(session){
		        if(session.valid){
		        	// Trigger login event
			        view.trigger("login",session);
		        }else{
			        $.msgBox.error("Invalid Credentials")
		        }
		    }
		});
	},
	
	
	initialize: function(){
		var view = this;
		view.animation = { progress: 0 };
	},
	
	render: function(){
		
	}
});