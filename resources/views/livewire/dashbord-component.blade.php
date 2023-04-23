<div>
    <form action="" method="post">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active  " id="nav-home" role="tabpanel"aria-labelledby="nav-home-tab">
               <div class="d-flex bg-white  flex-column align-items-center justify-content-center">
                {{-- update image  --}}
               
                <img src="{{asset('storage/'.Auth::user()->image )}}" width="250" height="250" class=" dashbord_image_user my-2 " alt="" srcset="">

                 <div class="d-flex justify-content-around responsive-form w-100">
                     <div class="tab-child ms-5 d-flex flex-column w-25">
                         <h4 class="my-3 navy fw-bold">Modifier Informations</h4>
                         <label for="">Nom d'utilisateur</label>
                         <input type="text" class="form-control mt-2 mb-3" placeholder="&#xf007   taper votre nom">
                         <label for="">Email</label>
                         <input type="text" class="form-control mt-2 mb-3" placeholder="&#xf0e0   taper votre Email">
                         <label for="">ville</label>
                         <input type="text" class="form-control mt-2 mb-3" placeholder="&#xf3c5   taper votre ville">
                     </div>
                     <div class="tab-child ms-5 d-flex flex-column w-25">
                         <h4 class="my-3 navy fw-bold">Modifier Mot de passe</h4>
                         <label for="">Mot de passe Actuel</label>
                         <input type="text" class="form-control mt-2 mb-3" placeholder="&#xf084  taper votre Mot de passe">
                         <label for="">Nouveau mot de passe</label>
                         <input type="text" class="form-control mt-2 mb-3" placeholder="&#xf084 taper un nouveau Mot de passe">
                         <label for="">Confirmer mot de passe</label>
                         <input type="text" class="form-control mt-2 mb-3" placeholder="&#xf084 retaper votre Mot De Pass">
                     </div>
                 </div>
                 <div> <button class="btn-p px-5 py-2 rounded-2 bc-navy btn-sav" type="submit">SAVEGARDER</button></div>
                
               </div>
            </div>
            
        </div>
    </form>
</div>