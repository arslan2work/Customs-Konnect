<template>
<!-- eslint-disable vue/no-use-v-if-with-v-for,vue/no-confusing-v-for-v-if -->

  <div>
    <div class="card" >
      <div class="card-header">
        <h3 class="card-title">ACI eManifest Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          
          <div class="row">
            <div class="col-sm-12">
              <ul>
                  <li v-for="user in acis.data" :key="user.id">
                      <div class="col-12 container" v-if="user.review == 'Approved'">
                        <div class="alert bg-success mb-5 py-4" role="alert">
                            <div class="d-flex"> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                <div class="px-3">
                                    <h5 class="alert-heading">Thankyou your data has been saved!</h5>
                                    <p>Your Aci has been Approved for Trip Number: {{user.tripNumber}}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 container" v-else-if="user.review == 'Denied'">
                        <div class="alert bg-danger mb-5 py-4" role="alert">
                            <div class="d-flex"> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                <div class="px-3">
                                    <h5 class="alert-heading">Thankyou your data has been saved!</h5>
                                    <p>Your Aci has been Denied for Trip Number: {{user.tripNumber}}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 container" v-else>
                        <div class="alert bg-warning mb-5 py-4" role="alert">
                            <div class="d-flex"> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                <div class="px-3">
                                    <h5 class="alert-heading">Thankyou your data has been saved!</h5>
                                    <p>Your Aci is under review for Trip Number: {{user.tripNumber}}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  </li>
              </ul>
              






            </div>
          </div>
          <div class="card-footer">
              <pagination :data="acis" @pagination-change-page="getResults"></pagination>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    



  </div>
  <!-- Modal -->
</template>

<script>
import VueQrcode from 'vue-qrcode'

import Form from "vform";

export default {
  components: {
    VueQrcode,
  },
  data: () => ({
    editmode: false,
    users: {},
    companies: {},
    acis: {},
    form: new Form({
      id: "",
      tripNumber: "",
      portOfEntry: "",
      subLocation: "",
      weight: "",
      quantity: "",
      company_id: "",
    }),
  }),
  methods: {
      getResults(page = 1) {
			axios.get('/api/aci?page=' + page)
				.then(response => {
					this.acis = response.data;
				});
		},

    loadUsers() {
      Promise.all([
        this.loadUser(),
        this.loadCompany(),
        this.loadAci(),
      ])
      },
      loadCompany() {
        axios.get("/api/company").then(({ data }) => {this.companies = data});
    },
    loadUser() {
        axios.get("/api/getUser").then(({ data }) => {this.users = data});
    },
    loadAci(){
      
      axios.get("/api/aci").then(({ data }) => (this.acis = data));
    },

    
  },
  created() {
            Fire.$on('searching',() => {
                let query = this.$parent.search;
                axios.get('api/findAci?q=' + query)
                .then((data) => {
                    this.acis = data.data
                })
                .catch(() => {
                })
            })
           this.loadUsers();
           
           Fire.$on('afterCreate',() => {
               this.loadUsers();
           });
        //    setInterval(() => this.loadUsers(), 3000);
        }
};
</script>
