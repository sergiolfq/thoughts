<template>
            <div class="panel panel-default">
                <div class="panel-heading">My thoughts</div>

                <div class="panel-body">
                    <form action="" v-on:submit.prevent="newThought()">
                       <div class="form-group">
                            <label for="thought">I am thinking of:</label>
                            <input type="text" class="form-control" name="thought"
                            v-model="description">
                       </div>
                       <button type="submit" class="btn btn-primary"> 
                             Send thought
                       </button>
                    </form>
                </div>
            </div>
 </template>

<script>
    export default {
        data(){
            return {
                description: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newThought(){
                const params = { 
                description: this.description}
                axios.post('/thoughts',params).then( (response)=> 
                {
                   console.log(response)    
                   const thought = response.data; 
                   this.$emit('new',  thought); 
                })
               
                this.description= '';
            }
        }
    }
</script>           