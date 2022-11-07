<template>
    <div class="modal-body">
        <form @click.prevent method="post">
            {{ }}
            <div class="form-group">
                <label for="exampleInputEmail1"> RFID</label>
                <span class="error" v-if="this.v$.num.$error">{{this.v$.$errors[0].$message}}</span>
                <input type="text" class="form-control" v-model="num" id="rfid" name="rfid">
            </div>

            <div class="modal-footer">
                <button type="submit" @click="sendReq()" class="btn btn-success">تاكيد</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
        </form>
    </div>
    <!-- <div class="modal-body">
        <form action="{{ route('call.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1"> RFID</label>
                <input type="text" class="form-control" id="rfid" name="rfid">
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">تاكيد</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
        </form>
    </div> -->
</template>

<script>
import axios from 'axios';
import { useVuelidate } from '@vuelidate/core'
import { required, minLength } from '@vuelidate/validators'
export default {
    data() {
        return {
            num: '',
            v$: useVuelidate(),
        }
    },
    validations() {
        return {
            num: { required, minLength: minLength(10) }, // Matches this.firstName

        }
    },
    methods: {
        async sendReq() {
            this.v$.$validate();
            if (!this.v$.$error) {
                let request = await axios.post('/api/recive-rfid', {
                    num: this.num,
                });
                if (request.data.code == 200) {
                    console.log('done')
                    this.$toast.success(`تم الاضافة`);
                } else {
                    console.log(request.data.message)
                }
            } else {
                //
            }
        },
    },
    // mounted() {
    //     window.Echo.channel("rfid").listen('NotificationRecieved', event => {
    //         console.log(event);
    //     })
    // }
}
</script>
<style>
    .error {
        display: block;
        color: red;
    }
</style>
