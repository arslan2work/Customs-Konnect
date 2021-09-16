<template>
    <div >
                <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-cart-arrow-down"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="fas fa-archive"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-shield"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
                <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" 
                       style="position: relative; height: 350px;">
                        <oldchart></oldchart>
                   </div>
                 
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->



























            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Send Task</h3>
                

                <div class="card-tools">
                  <span title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                
              </div>
              <div class="label" v-if="userMessage.user">Chat with {{userMessage.user.name}} <ul class="nav nav-tabs">
                          <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                              <i class="fas fa-ellipsis-h"></i>
                              <span class="badge badge-warning navbar-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                              <span @click.prevent="deleteAllMessage" class="dropdown-item dropdown-header">Delete All</span>
                              
                            </div>
                          </li>
                        </ul></div>
              
              <!-- /.card-header -->

                <div class="container-fluid">
                  <div class="row"  >
                  <div class="col-md-2 sidebar-dark-primary elevation-4  mainsi" v-chat-scroll>
                      <div class="">
                     <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                          <li class="nav-item" @click.prevent="selectUser(user.id)"  v-for="user in userList" :key="user.id">
                            <div class="about">
                              <div class="name">{{user.name}}</div>
                              
                            </div>
                        </li>
                        </ul>
                     </nav>
                   </div>
                  </div>


                  <div class="col-md-10 ">
                    <div class="direct-chat-messages" v-chat-scroll>
                <ul>
                  <li class="" v-for="message in userMessage.messages" :key="message.id"> 
                  <!-- Message. Default to the left -->
                  <div :class="` ${message.user.id == userMessage.user.id ? 'direct-chat-msg' : 'direct-chat-msg right'}`">
                    <div :class="` ${message.user.id == userMessage.user.id ? 'direct-chat-infos clearfix' : 'direct-chat-infos clearfix'}`">
                      <span :class="` ${message.user.id == userMessage.user.id ? 'direct-chat-name float-left' : 'direct-chat-name float-right'}`">{{message.user.name}}</span>
                      <span :class="` ${message.user.id == userMessage.user.id ? 'direct-chat-timestamp float-right' : 'direct-chat-timestamp float-left'}`">{{message.created_at | mytime}}</span>
                      <ul class="nav nav-tabs">
                          <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                              <i class="fas fa-ellipsis-h"></i>
                              <span class="badge badge-warning navbar-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                              <span @click.prevent="deleteSingleMessage(message.id)" class="dropdown-item dropdown-header">Delete Message</span>
                              
                            </div>
                          </li>
                        </ul>
                    </div>
                    <div class="direct-chat-text">
                      {{message.message}}
                    </div>
                    <div class="image-container">
                      <img class="img" v-if="message.image" :src="'/storage/'+message.image" alt="">
                    </div>
                    
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <!-- <div class="">
                    <div class="">
                      <span class="">Sarah Bullock</span>
                      <span class="">23 Jan 2:05 pm</span>
                    </div>
                    <div class="direct-chat-text">
                      You better believe it!
                    </div>
                  </div> -->
                  <!-- /.direct-chat-msg -->
                  </li>
                </ul>

              </div>
                  </div>

                  </div>
                </div>



                



              <!-- /.card-body -->
              
              
              <div class="card-footer">

                
                <form >
                  <div class="input-group ">
                    
                    <input @keydown.enter="sendMessage" v-model="message" type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
                
              </div>
            </div>
            <!--/.direct-chat -->























            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Personal tasks
                </h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
             

              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                 
                  
                  <li v-for="todo in todos.data" :key="todo.id">
                    
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo5" id="todoCheck5">
                      <label for="todoCheck5"></label>
                    </div>
                    <span class="text">{{todo.item}}</span>
                    <small class="badge badge-primary"><i class="fas fa-clock"></i> {{todo.created_at | todotime}}</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  
                </ul>
              </div>
              <!-- /.card-body -->
               <div class="card-footer">
                <form >
                  <div class="input-group">
                    <input @keydown.enter="createTodo" v-model="item"  type="text" name="message" placeholder="create todo....." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Add TODO</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->


















          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card ">
              <div class="card-header border-0">
               
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
                <div class=" control-section">
                            <newchart></newchart>
                        </div>
              <!-- /.card-body-->
              
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Weather
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              

                <newmap></newmap>
              
              <!-- /.card-body -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Calendar -->
            <div >
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user shadow">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{this.form.name}}</h3>
                <h5 class="widget-user-desc">{{this.form.type}}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" :src="getProfilePhoto()" >
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
    </div>
</template>

<script>


import Newchart from './charts/newchart.vue'
import oldchart from './charts/oldchart.vue'
import _ from 'lodash'

export default{
  components: { oldchart, Newchart,  },
 
  mounted(){
    // Echo.private(`chats.`)
    // .listen('MessageSend', (e) => {
    //   this.selectUser(e.message.to)
    //     // console.log(e);
    // });
    


    this.$store.dispatch('userList');
  },
  data(){
    return{
      message: '',
      authuser: '',
      todos: [],
      item: '',
      form: new Form({
                    id:'',
                    name : '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: ''
                })
    }

  },
  computed:{
    userList(){
      return this.$store.getters.userList
    },
    userMessage(){
      return this.$store.getters.userMessage
    }
  },
  created(){
    axios.get("/api/profile")
            .then(({ data }) => (this.form.fill(data)));
    this.getTodos();
  },
  methods: {
    selectUser(userId){
      this.$store.dispatch('userMessage', userId);
    },
    sendMessage(e){
      e.preventDefault();
      if(this.message!=''){
        axios.post('/sendMessage', {message:this.message, user_id:this.userMessage.user.id})
        .then(response => {
          this.selectUser(this.userMessage.user.id);
        })
        this.message = '';
      }
    },
    deleteSingleMessage(messageId){
      axios.get(`/deleteSingleMessage/${messageId}`)
      .then(response => {
        this.selectUser(this.userMessage.user.id)
      })
    },
    deleteAllMessage(){
      axios.get(`/deleteAllMessage/${this.userMessage.user.id}`)
      .then(response => {
        this.selectUser(this.userMessage.user.id)
    })
  },
  getTodos(){
    axios.get('/api/todos')
    .then(({ data }) => (this.todos = data));
  },
  createTodo(e){
      e.preventDefault();
      if(this.item!=''){
        axios.post('/api/createtodo', {item:this.item})
        .then(() => {
          this.getTodos()
        })
      }

    },
  getProfilePhoto(){
        let photo = (this.form.photo.length > 200) ? this.form.photo : "/img/profile/"+ this.form.photo ;
        return photo;
    },
      
  }  

}
</script>


<style scoped>
.mainsi{
  width: 180px;
  height: 400px;
}
.nav-item{
  color:lavender;
  padding-top: 10px;
  padding-bottom: 10px;
  cursor: pointer;
}
.nav-item:hover{
  color:salmon;
}
.direct-chat-messages{
  height: 400px;
}
li{
  list-style: none !important;
}
.mess-in{
  width: 700px !important;
}
.try{
  height: 30px !important;
  padding-left: 10px;
}
.try:hover{
  cursor: pointer !important;
  color: Mediumslateblue

}
.img{
  max-width: 300px;
  max-height: 200px;
}
</style>
