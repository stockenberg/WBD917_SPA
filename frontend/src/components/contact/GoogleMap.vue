<template>
    <div>
        <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2492.4256922756585!2d12.369866116025108!3d51.34008237960809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a6f826d499b689%3A0xce73e9257bde0292!2sSAE+Institute+Leipzig!5e0!3m2!1sen!2sde!4v1547636406612" 
      :height="heightProp" frameborder="0" style="border:0" allowfullscreen></iframe>
    <button @click="notifyParent">Check parent</button>
    </div>
</template>

<script>
export default {
    props: ['heightProp'],
    methods: {
        notifyParent() {
            
            this.$emit('customevent', {id: 1});
            EventHub.$emit('test', {id: 1337});
        }
    }
}
</script>


<style lang="scss">
    iframe{
        width: 80%;
    }
</style>

