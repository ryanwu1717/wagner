<?php
  include('partial/header.php');
?>
<div class="container">
  
  <div class="card o-hidden shadow-lg ">
    <div class="card-header py-3">
      權限管理
    </div>
    <div class="card-body">
       <div class="col-md-12">
          <div class="d-flex justify-content-around">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">選擇用戶</label>
              </div>
              <select class="custom-select" id="selectBook">
                <option selected disabled>選擇用戶</option>
                <option  v-for="(item, index) in items">
                  {{item.name}}
                </option>

               
              </select>
            </div>
          </div>
        </div>
       <div class="col-md-12">
        <div id="allchoose">
            <!-- <input type="submit" value="立即送出" v-on:click="clickme"> -->
          <button type="button" class="btn btn-primary" v-on:click="all">全選</button>
        </div>
          
        <div id="array-with-index" class="custom-control custom-switch">
          <div v-for="(item, index) in items">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">{{item.name}}</label>
          </div>
        </div>
       </div>
        
    </div>
  </div>
</div> 
<?php
  include('partial/footer.php');
?>
<script src="https://unpkg.com/vue@3.0.2"></script>

<script >
$(function(){
  $.ajax({
    url:'/user/getTable',
    type:'get',
    dataType:'json',
    success:function(response){
      console.log(response)
      Vue.createApp({
        data() {
          return {
            items: response
          }
        }
      }).mount('#selectBook')

    }
  });
   $.ajax({
    url:'/permission',
    type:'get',
    dataType:'json',
    success:function(response){
      
      console.log(response)

      Vue.createApp({
        data() {
          return {
            items: response
          }
        }
      }).mount('#array-with-index')
    }
  });
});
Vue.createApp({
  methods: {
    all() {
      alert('message')
      
    }
  }
}).mount('#allchoose')
</script>