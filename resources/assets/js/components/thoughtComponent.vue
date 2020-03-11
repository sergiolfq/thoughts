<template>
    <div class="panel panel-default">
                <div class="panel-heading">Published {{ thought.created_at}} by 
                </div>
                    <div class="panel-body">
                        <input v-if="editMode" type="text" class="form-control" v-model="thought.description">
                        <p v-else>{{ thought.description}}</p>
                    </div>
                    <div class="panel-footer">
                        <button v-if="editMode" class="btn btn-primary" v-on:click="onClickUpdate()" >
                         Save Changes
                        </button>
                        <button v-else class="btn btn-default" v-on:click="onClickEdit()" >
                         Edit
                        </button>
                        <button class="btn btn-danger" v-on:click="onClickDelete()" >
                         Delete
                        </button>
                    </div>
                </div> 
    </div>    
</template>

<script>
    export default {
         props :  [ 'thought'],
        data(){
            return({ 
                editMode: false
            }
            )
        },
        methods: {
            onClickDelete(){
               
                axios.delete(`/thoughts/${this.thought.id}`).then( 
                    ()=>{
                      this.$emit('delete');
                    }
                )    
                    
            },
            onClickEdit(){
                this.editMode = true;
               // this.$emit('edit');    
            }, 
            onClickUpdate(){
                const params = { description: this.thought.description }
                axios.put( `/thoughts/${this.thought.id}`,params).then( 
                    (response)=>{ 
                      this.editMode = false;
                      const thought = response.data;
                      this.$emit('update',thought);
                    }
                )    
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
