               <!-- Tab panes -->
               <div class="tab-content">
                   <div wire:ignore.self class="tab-pane container active card" id="home">
                       @include('admin.items.form.add.lost')
                   </div>
                   <div wire:ignore.self class="tab-pane container fade card" id="menu1">
                       @include('admin.items.form.add.found')
                   </div>

               </div>
