<template>
    <nav>
        <el-menu class="el-menu-demo" mode="horizontal">
            <el-row type="flex" class="row-bg" justify="center">
                <el-col :span="3">
                    <div class="nav-left">logo</div>
                </el-col>
                <el-col :span="9">
                    <div class="nav-middle">
                        <el-input
                                placeholder="Search"
                                v-model="searchString">
                            <i slot="suffix" class="el-input__icon el-icon-search"></i>
                        </el-input>
                    </div>
                </el-col>
                <el-col :span="3">
                    <div class="nav-right">
                       menu
                    </div>
                </el-col>
            </el-row>
        </el-menu>
    </nav>
</template>

<style scoped>
    .el-menu-demo {
        padding: 5px 15px;
    }

    .nav-left {
        display: flex;
        margin:auto;
        height: 100%;
    }

    .nav-middle {
        display: flex;
        margin:auto;
        width: 80%;
        justify-content: center;
        align-items: center;
    }

    .nav-right {
        display: flex;
        margin:auto;
        height: 100%;
    }
</style>

<script>
    export default {
        name: 'navbar',
        data() {
            return {
                activeIndex: '1',
                searchString: "",
            };
        },
        methods: {
            search: function () {
                console.log(this.searchString)
            }
        },
        watch: {
            searchString: function () {
                console.log(this.searchString)
            }
        }
    }
</script>