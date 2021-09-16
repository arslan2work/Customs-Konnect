<template>
<!-- eslint-disable vue/no-use-v-if-with-v-for,vue/no-confusing-v-for-v-if -->

  <div>
    <div class="card" >
      <div class="card-header">
        <h3 class="card-title">Pre Arrival Review System</h3>
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
                      Review
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
                      <!-- <span class="badge badge-primary" :class="">Approved</span> -->
                      <span :class="`${user.review == 'Approved' ? 'badge badge-primary' : 'badge badge-danger'}`">{{user.review}}</span>
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
                    <th rowspan="1" colspan="1">Review</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer">
              <pagination :data="acis" @pagination-change-page="getResults"></pagination>
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
              v-show="!editmode"
              id="exampleModalLongTitle"
            >
              Add New ACI
            </h5>
            <h5
              class="modal-title"
              v-show="editmode"
              id="exampleModalLongTitle"
            >
              Edit ACI
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
          <form @submit.prevent="editmode ? updateUser() : createUser()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.tripNumber"
                  type="text"
                  name="name"
                  class="form-control"
                  placeholder="Username"
                />
                <div
                  class="text-red"
                  v-if="form.errors.has('name')"
                  v-html="form.errors.get('name')"
                />
              </div>
              <div class="form-group">
                <input
                  v-model="form.portOfEntry"
                  type="text"
                  name="text"
                  class="form-control"
                  placeholder="port"
                />
                <div
                  class="text-red"
                  v-if="form.errors.has('email')"
                  v-html="form.errors.get('email')"
                />
              </div>
              <div class="form-group">
                <textarea
                  v-model="form.subLocation"
                  name="bio"
                  id="bio"
                  class="form-control"
                  placeholder="Bio"
                ></textarea>
                <div
                  class="text-red"
                  v-if="form.errors.has('bio')"
                  v-html="form.errors.get('bio')"
                />
              </div>
              <div class="form-group">
                <select
                  v-model="form.truck"
                  name="type"
                  id="type"
                  class="form-control"
                  placeholder="Select Truck"
                >
                
                  <option placeholder="Select Truck"  v-for="user in trucks.data" :key="user.id">{{user.truckNumber}}</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('type')"
                  v-html="form.errors.get('type')"
                />
              </div>
              <div class="form-group">
                <select
                  v-model="form.trailer"
                  name="type"
                  id="type"
                  class="form-control"
                  placeholder="Bio"
                >
                  <option v-for="user in trailers.data" :key="user.id">{{user.trailerNumber}}</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('type')"
                  v-html="form.errors.get('type')"
                />
              </div>
              <div class="form-group">
                <select
                  v-model="form.company_id"
                  name="type"
                  id="LicenseState"
                  class="form-control"
                  placeholder="LicenseState"
                >
                  <option  >{{users.company_id}}</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('LicenseState')"
                  v-html="form.errors.get('LicenseState')"
                />
              </div>
              <div class="form-group">
                <select
                  v-model="form.driver"
                  name="type"
                  id="type"
                  class="form-control"
                  placeholder="Bio"
                >
                  <option v-for="user in drivers.data" :key="user.id">{{user.fullName}}</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('type')"
                  v-html="form.errors.get('type')"
                />
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
              <button v-show="editmode" type="submit" class="btn btn-success">
                Edit ACI
              </button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">
                Create ACI
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
</template>

<script>
import Form from "vform";
import NotFound from "./NotFound.vue";

export default {
  data: () => ({
    editmode: false,
    users: {},
    companies: {},
    acis: {},
    trucks: {},
    trailers: {},
    drivers: {},
    form: new Form({
      id: "",
      tripNumber: "",
      portOfEntry: "",
      subLocation: "",
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
    updateUser() {
      this.$Progress.start();
      this.form
        .put("/api/aci/" + this.form.id)
        .then(() => {
          $("#addnew").modal("hide");
          Toast.fire({
            icon: "success",
            title: "User Updated in successfully",
          });
          this.$Progress.finish();
          Fire.$emit("afterCreate");
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    editModal(user) {
      this.editmode = true;
      this.form.clear();
      this.form.reset();
      $("#addnew").modal("show");
      this.form.fill(user);
    },
    newModal() {
      this.editmode = false;
      this.form.clear();
      this.form.reset();
      $("#addnew").modal("show");
    },
    deleteUser(id) {
      swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then((result) => {
          //send request to server
          if (result.isConfirmed) {
            this.form
              .delete("/api/aci/" + id)
              .then(() => {
                swal.fire("Deleted!", "Your file has been deleted.", "success");
                Fire.$emit("afterCreate");
              })
              .catch(() => {
                swal("Failed", "There was something wrong", "warning");
              });
          }
        });
    },
    loadUsers() {
      Promise.all([
        this.loadAci(),
      ])
      },
    loadAci(){
      
      axios.get("/api/aci").then(({ data }) => (this.acis = data));
    },

    createUser() {
      this.$Progress.start();
      this.form
        .post("/api/aci")
        .then(() => {
          Fire.$emit("afterCreate");
          $("#addnew").modal("hide");
          Toast.fire({
            icon: "success",
            title: "User Created in successfully",
          });
          this.$Progress.finish();
        })
        .catch(() => {});
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

 
