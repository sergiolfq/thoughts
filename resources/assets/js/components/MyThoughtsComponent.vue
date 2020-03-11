<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
            <form-component @new="addThoughts"></form-component>

            <thought-component 
            v-for="(thought,index) in thoughts" 
            :key="thought.id"
            :thought="thought"
            @delete="deleteThought(index)"
            @edit="editThought(index)"
            @update="updateThought(index,...arguments)">
            </thought-component>

        </div>
    </div>
</div> 
</template>

<script>
    export default {
                              
        data(){
            return {
            thoughts:[
            ]
            }
        },
        methods: {
            addThoughts(thought) {
                this.thoughts.push(thought)
            }, 
            deleteThought(index){
                this.thoughts.splice(index,1);
            },
            updateThought(index,thought){
                this.thoughts[index]=thought;
            },
        },
        mounted() {
            axios.get('thoughts').then((response)=>{ 
                this.thoughts= response.data
             }   )
        }
    }
</script>
