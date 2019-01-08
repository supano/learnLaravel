<template>
    <el-row :gutter="10" v-if="!loading">
        <el-col :span="24">
            <el-card :body-style="{ padding: '0px' }" v-for="(data, index) in timeline" :key="index">
                <img :src="data.image" class="image">
                <div style="padding: 14px;">
                    <span>Yummy hamburger</span>
                    <div class="bottom clearfix">
                        <time class="time">11:11:11</time>
                        <el-button type="text" class="button">Operating button</el-button>
                    </div>
                </div>
            </el-card>

        </el-col>
    </el-row>
    <el-row :gutter="10" v-else>
        <el-col :span="24">
            <el-card :body-style="{ padding: '0px' }" v-loading="loading">
                <img src="https://images.pexels.com/photos/1639562/pexels-photo-1639562.jpeg?cs=srgb&dl=bread-bun-burger-1639562.jpg&fm=jpg" class="image">
                <div style="padding: 14px;">
                    <span>Yummy hamburger</span>
                    <div class="bottom clearfix">
                        <time class="time">11:11:11</time>
                        <el-button type="text" class="button">Operating button</el-button>
                    </div>
                </div>
            </el-card>

        </el-col>
    </el-row>
</template>

<style scoped>
    .time {
        font-size: 13px;
        color: #999;
    }

    .bottom {
        margin-top: 13px;
        line-height: 12px;
    }

    .button {
        padding: 0;
        float: right;
    }

    .image {
        width: 100%;
        display: block;
    }

    .clearfix:before,
    .clearfix:after {
        display: table;
        content: "";
    }

    .clearfix:after {
        clear: both
    }

    .el-card {
        margin-bottom: 20px;
    }
</style>


<script>
    export default {
        props: ['timelineData'],
        data() {
            return {
                timeline: this.timelineData,
                loading: true
            }
        },
        watch: {
            timelineData: function(newVal, oldVal) {
                this.timeline = newVal
                console.log('new',newVal)
                console.log('old',oldVal)
                if (this.timeline == "") {
                    this.loading = true
                } else {
                    this.loading = false
                }
            }
        }
    }
</script>