<template>
    <div class="col-sm mt-2  d-flex justify-content-center">
        <h5>{{ current_time }}</h5>
    </div>
</template>

<script>
import moment from 'moment';

export default {
    name: "time_component",
    data() {
        return {
            current_time : moment().format(" hh:mm:ss A"),
            timer: "",
        }
    },
    mounted() {
       this.startTimer();
    },
    methods : {
        startTimer() {
            this.timer = setInterval(() => {
                this.showTime();
            }, 1000);
        },
        stopTimer() {
            clearInterval(this.timer);
        },
        showTime(){
            this.current_time = moment().format(" hh:mm:ss A");
        }
    }
}
</script>

<style scoped>

</style>
