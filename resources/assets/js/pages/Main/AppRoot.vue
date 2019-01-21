<template>
    <h2>Welcome</h2>
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