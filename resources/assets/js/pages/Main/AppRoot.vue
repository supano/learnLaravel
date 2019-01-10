<template>
    <div id="app-root">
        <navbar></navbar>
        <el-container id="content-wrapper">
            <el-main>
                <el-row :gutter="10" type="flex" class="" justify="center">
                    <el-col :span="3">
                        <LeftPanel></LeftPanel>
                    </el-col>
                    <el-col :span="9">
                        <timeline></timeline>
                    </el-col>
                    <el-col :span="3">
                        <RightPanel></RightPanel>
                    </el-col>
                </el-row>
            </el-main>
        </el-container>

    </div>
</template>

<style>
    #app-root {
        height: 100%;
    }

    #content-wrapper {
        top: 50px;
        height: 100%;
    }
</style>

<script>
    import navbar from '@/components/navbar/Navbar.vue'
    import timeline from '@/components/timeline/Timeline'
    import LeftPanel from '@/components/left-panel/LeftPanelWrapper'
    import RightPanel from '@/components/right-panel/RightPanelWrapper'

    export default {
        components: {
            navbar,
            timeline,
            LeftPanel,
            RightPanel
        }
    }
</script>