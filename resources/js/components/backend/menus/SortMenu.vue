<template>
    <div>
        <div class="card">
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 ">
                            <div class="form-group">
                                <div class="form-check-inline" v-for="(item, index) in menu_location">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" v-model="search.location" class="custom-control-input" :id="'location_'+index" name="location" :value="index" :checked="search.location === index">
                                        <label class="custom-control-label" :for="'location_'+index">{{ item }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 text-center">
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm" type="button" @click="setupMenu"><i class="fa fa-filter"></i> Filter</button>
                                <button class="btn btn-default btn-sm" type="button" @click="clearSearch"> Clear</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ title }}</h3>
            </div>
            <div class="card-body">
                <div class="dd">
                    <ol class="dd-list" v-html="data.join('')">

                    </ol>
                    <!--        <button class="btn btn-primary btn-sm" @click="save()"><i class="fa fa-save"> </i> Save</button>-->
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "SortMenu",
        props: ['title', 'menu_location'],
        data(){
            return {
                data: [],
                tree: [],
                search: {
                    location: 0
                }
            };
        },
        created(){
            this.setupMenu();
        },
        mounted() {
            $('.dd').nestable({
                group: 1,
                maxDepth: 3,
            }).on('change', this.save);
            let that = this;
            $('input[name=location]').on('change', function(e){
                that.search.location = $(this).val();
            });
        },
        methods: {
            async getData(){
                return await axios.get('/admincp/menu/get-all-item-menu', {
                    params: this.search
                });
            },
            async setupMenu(){
                let data = await this.getData();
                this.data = [];
                this.createChild(data.data);
            },
            createTree(data, parent_id = 0){
                let child = [];
                if(data.length > 0){
                    for(let item of data){
                        if(typeof item === 'undefined')
                            continue;
                        if(item.parent === parent_id){
                            child.push(item);
                            delete data[data.indexOf(item)];
                        }
                    }
                }
                if(child.length > 0) {
                    for (let item of child) {
                        if(item.parent === 0){
                            this.data.push(item);
                        }
                        else{
                            let indexParent = this.data.findIndex(x => x.id === item.parent, item);
                            if(typeof this.data[indexParent]['children'] === 'undefined')
                                this.data[indexParent].children = [item];
                            else
                                this.data[indexParent].children.push(item);
                        }
                        if(data.filter(x => x.parent === item.id, item).length>0){
                            this.createTree(data, item.id);
                        }
                    }
                }
            }
            ,
            createChild(data, parent_id = 0){
                let child = [];
                if(data.length > 0){
                    for(let item of data){
                        if(typeof item === 'undefined')
                            continue;
                        if(parseInt(item.parent) === parent_id){
                            child.push(item);
                            delete data[data.indexOf(item)];
                        }
                    }
                }
                if(child.length > 0){
                    for(let item of child){
                        if(data.filter(x => parseInt(x.parent) === parseInt(item.id), item).length>0){
                            this.data.push(`<li class="dd-item" data-id="${item.id}">`);
                            this.data.push(`<button data-action="collapse" type="button">Collapse</button>`);
                            this.data.push(`<button data-action="expand" type="button" style="display: none;">Expand</button>`);
                            this.data.push(`<div class="dd-handle">${item.name}</div>`);
                            this.data.push('<ol class="dd-list">');
                            this.createChild(data, item.id);
                            this.data.push('</ol>');
                            this.data.push('</li>');
                        }
                        else{
                            this.data.push(`<li class="dd-item" data-id="${item.id}">`);
                            this.data.push(`<div class="dd-handle">${item.name}</div>`);
                            this.data.push('</li>');
                        }
                    }
                }
            },
            update(data){
                axios.patch('/admincp/menu/update-sort-menu', {
                    params: data
                }).then(res => {
                    this.pushNotification('success', _.flatten(_.toArray(res.data.success)));
                }).catch(res => {
                    if (typeof error.response.data === 'object') {
                        this.pushNotification('error', _.flatten(_.toArray(error.response.data.errors)));
                    } else {
                        this.pushNotification('error', ['Something went wrong. Please try again.']);
                    }
                });

            },
            pushNotification(type, messages){
                for(let item of messages)
                    toastr[type](item);
            },
            save(e){
                let list   = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output = list.nestable('serialize');//, null, 2));
                    this.update(output);
                } else {
                    console.error('JSON browser support required for this demo.');
                }

            },
            clearSearch(){
                this.search.location = 0;
                $('input[name=location]').first().prop('checked', true);
                this.setupMenu();
            }
        }
    }
</script>

<style scoped>

</style>
