<template>
<!-- eslint-disable vue/no-use-v-if-with-v-for,vue/no-confusing-v-for-v-if -->

  <div>
    <div class="card" >
      <div class="card-header">
        <h3 class="card-title">ACIs Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          
          <div class="row">
            <div class="col-sm-12 col-md-8">
              <div class="dt-buttons btn-group flex-wrap">
                <button
                  class="btn btn-secondary buttons-copy buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Copy</span>
                </button>
                <button
                  class="btn btn-secondary buttons-csv buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>CSV</span>
                </button>
                <button
                  class="btn btn-secondary buttons-excel buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Excel</span>
                </button>
                <button
                  class="btn btn-secondary buttons-pdf buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>PDF</span>
                </button>
                <button
                  class="btn btn-secondary buttons-print"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Print</span>
                </button>
                <div class="btn-group">
                  <button
                    class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                    tabindex="0"
                    aria-controls="example1"
                    type="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <span>Column visibility</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div id="example1_filter" class="dataTables_filter">
                <label
                  >Search:
                  <input
                    type="search"
                    class="form-control form-control-md"
                    placeholder=""
                    aria-controls="example1"
                  />
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table
                id="example1"
                class="table table-bordered table-striped dataTable dtr-inline"
                role="grid"
                aria-describedby="example1_info"
              >
                <thead>
                  <tr role="row">
                    <th
                      class="sorting sorting_asc"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-sort="ascending"
                      aria-label=""
                    >
                      ID
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Trip Number
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Port Of Entry
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Sub Location
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Truck
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Trailer
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Driver
                    </th>
                    
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Status
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd" v-for="user in acis.data" :key="user.id" >
                    <td>{{ user.id }}</td>
                    <td>{{ user.tripNumber }}</td>
                    <td>{{ user.portOfEntry }}</td>
                    <td>{{ user.subLocation }}</td>
                    <td>{{ user.truck }}</td>
                    <td>{{ user.trailer }}</td>
                    <td>{{ user.driver }}</td>
                    <td>
                      <button id="approve"  class="badge badge-primary" v-if="user.status == 'Approve'"><span>Approve</span></button>
                      <button id="dismiss"  class="badge badge-danger" v-else-if="user.status == 'Dismiss'"><span>Dismiss</span></button>
                      <button v-else class="py-2" href="#" @click="editModal(user)">
                        <i class="fa fa-edit py-2 text-yellow"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th rowspan="1" colspan="1">ID</th>
                    <th rowspan="1" colspan="1">Trip Number</th>
                    <th rowspan="1" colspan="1">Port Of Entry</th>
                    <th rowspan="1" colspan="1">Sub Location</th>
                    <th rowspan="1" colspan="1">Truck</th>
                    <th rowspan="1" colspan="1">Trailer</th>
                    <th rowspan="1" colspan="1">Driver</th>
                    <th rowspan="1" colspan="1">Status</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer">
              <pagination :data="acis" @pagination-change-page="getResultsACI"></pagination>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
<div
      class="modal fade"
      id="addnew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLongTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="exampleModalLongTitle"
            >
            Update Status
            </h5>
           
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    <form  @submit.prevent="updateDispatch()">
      <div class="modal-body">
              <div class="form-group">
      <span>Status</span>
                        <select
                          v-model="form.status"
                          name="type"
                          id="type"
                          class="form-control "
                          placeholder="Bio"
                        >
                          <option class="badge badge-primary"  value="Approve">Approve</option>
                          <option class="badge badge-danger"  value="Dismiss">Dismiss</option>
                        </select>
                        
                      <!-- <button id="dismiss"  class="dis-border" >
                        <span class="badge badge-primary" :value="Approve" @click="approve()">Approve</span>
                        <span class="badge badge-danger" :value="Dismiss" @click="dismiss()">Dismiss</span>
                      </button> -->
              </div></div>
                      <div class="modal-footer">
              
              <button  type="submit" class="btn btn-success">
                Update Status
              </button>
              
            </div>
      
      </form>

        </div></div></div>

    <div class="card" >
      <div class="card-header">
        <h3 class="card-title">ACE Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          
          <div class="row">
            <div class="col-sm-12 col-md-8">
              <div class="dt-buttons btn-group flex-wrap">
                <button
                  class="btn btn-secondary buttons-copy buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Copy</span>
                </button>
                <button
                  class="btn btn-secondary buttons-csv buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>CSV</span>
                </button>
                <button
                  class="btn btn-secondary buttons-excel buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Excel</span>
                </button>
                <button
                  class="btn btn-secondary buttons-pdf buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>PDF</span>
                </button>
                <button
                  class="btn btn-secondary buttons-print"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Print</span>
                </button>
                <div class="btn-group">
                  <button
                    class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                    tabindex="0"
                    aria-controls="example1"
                    type="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <span>Column visibility</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div id="example1_filter" class="dataTables_filter">
                <label
                  >Search:
                  <input
                    type="search"
                    class="form-control form-control-md"
                    placeholder=""
                    aria-controls="example1"
                  />
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table
                id="example1"
                class="table table-bordered table-striped dataTable dtr-inline"
                role="grid"
                aria-describedby="example1_info"
              >
                <thead>
                  <tr role="row">
                    <th
                      class="sorting sorting_asc"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-sort="ascending"
                      aria-label=""
                    >
                      ID
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Trip Number
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Port Of Entry
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Sub Location
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Truck
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Trailer
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Driver
                    </th>
                    
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Status
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd" v-for="user in aces.data" :key="user.id" >
                    <td>{{ user.id }}</td>
                    <td>{{ user.tripNumber }}</td>
                    <td>{{ user.portOfEntry }}</td>
                    <td>{{ user.subLocation }}</td>
                    <td>{{ user.truck }}</td>
                    <td>{{ user.trailer }}</td>
                    <td>{{ user.driver }}</td>
                    <td>
                      <button id="approve"  class="badge badge-primary" v-if="user.statusAce == 'Approve'"><span>Approve</span></button>
                      <button id="dismiss"  class="badge badge-danger" v-else-if="user.statusAce == 'Dismiss'"><span>Dismiss</span></button>
                      <button v-else class="py-2" href="#" @click="editModal2(user)">
                        <i class="fa fa-edit py-2 text-yellow"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th rowspan="1" colspan="1">ID</th>
                    <th rowspan="1" colspan="1">Trip Number</th>
                    <th rowspan="1" colspan="1">Port Of Entry</th>
                    <th rowspan="1" colspan="1">Sub Location</th>
                    <th rowspan="1" colspan="1">Truck</th>
                    <th rowspan="1" colspan="1">Trailer</th>
                    <th rowspan="1" colspan="1">Driver</th>
                    <th rowspan="1" colspan="1">Status</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer">
              <pagination :data="aces" @pagination-change-page="getResultsACE"></pagination>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>

<div
      class="modal fade"
      id="addnew1"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLongTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="exampleModalLongTitle"
            >
            Update Status ACE
            </h5>
           
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    <form  @submit.prevent="updateDispatchACE()">
      <div class="modal-body">
              <div class="form-group">
      <span>Status</span>
                        <select
                          v-model="form.statusAce"
                          name="type"
                          id="type"
                          class="form-control "
                          placeholder="Bio"
                        >
                          <option class="badge badge-primary"  value="Approve">Approve</option>
                          <option class="badge badge-danger"  value="Dismiss">Dismiss</option>
                        </select>
                        
                      <!-- <button id="dismiss"  class="dis-border" >
                        <span class="badge badge-primary" :value="Approve" @click="approve()">Approve</span>
                        <span class="badge badge-danger" :value="Dismiss" @click="dismiss()">Dismiss</span>
                      </button> -->
              </div></div>
                      <div class="modal-footer">
              
              <button  type="submit" class="btn btn-success">
                Update Status
              </button>
              
            </div>
      
      </form>

        </div></div></div>













    <div class="card" >
      <div class="card-header">
        <h3 class="card-title">In-Bond Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          
          <div class="row">
            <div class="col-sm-12 col-md-8">
              <div class="dt-buttons btn-group flex-wrap">
                <button
                  class="btn btn-secondary buttons-copy buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Copy</span>
                </button>
                <button
                  class="btn btn-secondary buttons-csv buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>CSV</span>
                </button>
                <button
                  class="btn btn-secondary buttons-excel buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Excel</span>
                </button>
                <a
                  class="btn btn-secondary buttons-pdf buttons-html5"
                  href="#"
                  @click.prevent="printMe"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>PDF</span>
                </a>
                <button
                  class="btn btn-secondary buttons-print"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Print</span>
                </button>
                <div class="btn-group">
                  <button
                    class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                    tabindex="0"
                    aria-controls="example1"
                    type="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <span>Column visibility</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div id="example1_filter" class="dataTables_filter">
                <label
                  >Search:
                  <input
                    type="search"
                    class="form-control form-control-md"
                    placeholder=""
                    aria-controls="example1"
                  />
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table
                id="example1"
                class="table table-bordered table-striped dataTable dtr-inline"
                role="grid"
                aria-describedby="example1_info"
              >
                <thead>
                  <tr role="row">
                    <th
                      class="sorting sorting_asc"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-sort="ascending"
                      aria-label=""
                    >
                      ID
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Entry Number
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Bill Of Entry
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Warnings
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Bond Type
                    </th>
                    
                    
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Status
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd" v-for="user in bonds.data" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.entryNumber }}</td>
                    <td>{{ user.bill }}</td>
                    <td>{{ user.warning }}</td>
                    <td>{{ user.type }}</td>
                    <td>
                      <button id="approve"  class="badge badge-primary" v-if="user.statusBond == 'Approve'"><span>Approve</span></button>
                      <button id="dismiss"  class="badge badge-danger" v-else-if="user.statusBond == 'Dismiss'"><span>Dismiss</span></button>
                      <button v-else class="py-2" href="#" @click="editModal3(user)">
                        <i class="fa fa-edit py-2 text-yellow"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th rowspan="1" colspan="1">ID</th>
                    <th rowspan="1" colspan="1">Entry Number</th>
                    <th rowspan="1" colspan="1">Bill Of Entry</th>
                    <th rowspan="1" colspan="1">Warnings</th>
                    <th rowspan="1" colspan="1">Type</th>
                    <th rowspan="1" colspan="1">Status</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer">
              <pagination :data="bonds" @pagination-change-page="getResultsInbond"></pagination>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>

    <div
      class="modal fade"
      id="addnew2"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLongTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="exampleModalLongTitle"
            >
            Update Status In-Bond
            </h5>
           
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    <form  @submit.prevent="updateDispatchBond()">
      <div class="modal-body">
              <div class="form-group">
      <span>Status</span>
                        <select
                          v-model="form.statusBond"
                          name="type"
                          id="type"
                          class="form-control "
                          placeholder="Bio"
                        >
                          <option class="badge badge-primary"  value="Approve">Approve</option>
                          <option class="badge badge-danger"  value="Dismiss">Dismiss</option>
                        </select>
                        
                      <!-- <button id="dismiss"  class="dis-border" >
                        <span class="badge badge-primary" :value="Approve" @click="approve()">Approve</span>
                        <span class="badge badge-danger" :value="Dismiss" @click="dismiss()">Dismiss</span>
                      </button> -->
              </div></div>
                      <div class="modal-footer">
              
              <button  type="submit" class="btn btn-success">
                Update Status
              </button>
              
            </div>
      
      </form>

        </div></div></div>
    
    
  </div>
  <!-- Modal -->
</template>

<script>
import Form from "vform";

export default {
  data: () => ({
    acis: {},  
    aces: {},
    bonds: {},
    form: new Form({
      id: "",
      tripNumber: "",
      portOfEntry: "",
      subLocation: "",
      company_id: "",
      status: "",
      statusAce: "",
      statusBond: "",
    }),
  }),
  methods: {
      getResultsACI(page = 1) {
			axios.get('/api/aci?page=' + page)
				.then(response => {
					this.acis = response.data;
				});
		},
    getResultsACE(page = 1) {
			axios.get('/api/ace?page=' + page)
				.then(response => {
					this.aces = response.data;
				});
		},
        getResultsInbond(page = 1) {
			axios.get('/api/bond?page=' + page)
				.then(response => {
					this.bonds = response.data;
				});
		},
    loadUsers() {
      Promise.all([
        this.loadAci(),
        this.loadAce(),
        this.loadbond(),
      ])
      },
      loadbond(){
                axios.get("/api/bond").then(({ data }) => (this.bonds = data));

      },
    loadAci(){
      
      axios.get("/api/aci").then(({ data }) => (this.acis = data));
    },
    loadAce(){
      
      axios.get("/api/ace").then(({ data }) => (this.aces = data));
    },
    fill(user){
      this.form.fill(user);
    },
    updateDispatch(){
      this.$Progress.start();
      this.form
        .put("/api/aci/" + this.form.id)
        .then(() => {
          Toast.fire({
            icon: "success",
            title: "User Updated in successfully",
          });
          this.$Progress.finish();
                $("#addnew").modal("hide");

        })
        .catch(() => {
          this.$Progress.fail();
                $("#addnew").modal("hide");

        });
    },
    updateDispatchACE(){
      this.$Progress.start();
      this.form
        .put("/api/ace/" + this.form.id)
        .then(() => {
          Toast.fire({
            icon: "success",
            title: "User Updated in successfully",
          });
          this.$Progress.finish();
          $("#addnew1").modal("hide");
        })
        .catch(() => {
          this.$Progress.fail();
          $("#addnew1").modal("hide");
        });
    },
    updateDispatchBond(){
      this.$Progress.start();
      this.form
        .put("/api/bond/" + this.form.id)
        .then(() => {
          Toast.fire({
            icon: "success",
            title: "User Updated in successfully",
          });
          this.$Progress.finish();
          $("#addnew2").modal("hide");
        })
        .catch(() => {
          this.$Progress.fail();
          $("#addnew2").modal("hide");
        });
    },
    editModal(user) {
      this.form.clear();
      this.form.reset();
      $("#addnew").modal("show");
      this.form.fill(user);
    },
    editModal2(user) {
      this.form.clear();
      this.form.reset();
      $("#addnew1").modal("show");
      this.form.fill(user);
    },
    editModal3(user) {
      this.form.clear();
      this.form.reset();
      $("#addnew2").modal("show");
      this.form.fill(user);
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
