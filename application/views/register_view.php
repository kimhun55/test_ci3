<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <br>
        <br>
        <h1>Register</h1>
                    <form  id="app" @submit="checkForm" method="POST" action="<?php echo site_url('register/save');?>" >
                        <div class="mb-3">
                            <label  class="form-label">Email address</label>
                            <input type="email" name="email" v-model="email" class="form-control" @keyup="checkemail()" required>
                            <span v-if="check == 1">Email นี้ มีการใช้งานอยู่แล้ว !!!</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" v-model="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">password confirm</label>
                            <input type="password" name="password_confirm" v-model="password_confirm" class="form-control" required>
                            <span v-if="checkpass == 1">password ไม่ตรงกัน </span>
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">firstname</label>
                            <input type="text" name="firstname" class="form-control" required>
                            
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">lastname</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
    </div>
    <script src="<?php echo base_url('vue.js');?>"></script>
	<script src="<?php echo base_url('axios-master/dist/axios.min.js');?>"></script>
<script>
    const myapp = new Vue({
  el: '#app',
  data: {

    email: null,
    check : 0,
    password : null,
    password_confirm : null,
    checkpass :  0
  },
  methods:{
    checkForm: function (e) {
    
      if (this.check == 0) {
      if (this.password == this.password_confirm) {
        myapp.checkpass = 0;
        return true;
      }else{
     
        myapp.checkpass = 1;

      }
    }

       this.errors = [];
          this.errors.push('check email !!!');
      e.preventDefault();
    },
    checkemail: function(){
    
        var email = this.email.trim();

        if(email != ''){
            axios.get('<?php echo site_url("register/check");?>',{
            params :{
                email: email
            }
            })
            .then(function(res){
                console.log(res);
                myapp.check = res.data;
            });
        }

    }
  }
})
</script>
</body>
</html>