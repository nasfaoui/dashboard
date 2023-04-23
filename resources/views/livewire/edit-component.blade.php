

        <div class=" d-flex justify-content-center">
           
            <div class=" post-left-box  m-3 bg-white shadow-sm p-3 mb-5  rounded  ">
               <div class=" justify-content-center align-items-center ">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Titre de l'annonce : </label>
                            <input type="title" class="form-control" name="title" id="exampleFormControlInput1" value="{{ $service ->title }}" placeholder="Titre de l'annonce">
                            @error('title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">locatisation : </label>
                            <select name="location" class="form-select" id="select-country" style="align-items: center ; text-align: left;" >
                                <option value=""> choose Ville </option>
                            </select>
                            @error('location')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
    
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Categorie :</label>
                            <select name="category" class="form-select" id="select-category" style="align-items: center ; text-align: left;" >
                                <option value=""> choose Categorie </option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_title}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">A partir de : </label>
                            <input type="number" class="form-control" name="price" id="exampleFormControlInput1" value="{{ $service ->price }}" placeholder="à partir de ... ">
                            @error('price')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description : </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" cols="50" rows="6" >{{ $service ->description }}</textarea>
                            @error('description')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
    
                            <div class="mb-3">
                                <label for="formFileDisabled" class="form-label">les images de l'annonce : </label>
                                <input class="form-control " type="file" id="formFileDisabled"  name="images[]" multiple>
                                  @error('images')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                            </div>
                            <div class="d-grid ">
                               
                                    <button type="submit" class=" btn-block  btn btn-primary" >Modifier L'ANNONCE</button>
                               
                            </div>
               </div>
            </div>
            
            <div class="post-right-box d-none d-xxl-block m-3 bg-white shadow-sm p-3 mb-5  rounded  ">
                <h6>Conseils pour accepter le service</h6>
                <div class="conseil">
                    <div class="main-title">
                        Description du service
                    </div>
                    <div class="main-body">
                        <p>Rédigez une description distincte du service dans un langage approprié sans erreurs, au cours de laquelle vous expliquez en détail ce que le client recevra lors de l'achat du service.</p>
                    </div>
                </div>
                <div class="conseil">
                    <div class="main-title">
                        Galerie de services
                    </div>
                    <div class="main-body">
                        <p>Ajoutez une image expressive du service, en plus d'au moins trois formulaires exclusifs à travers lesquels l'acheteur connaîtra votre style de travail et vos compétences.
                        </p>
                    </div>
                </div>
                <div class="conseil">
                    <div class="main-title">
                        Prix ​​de la prestation
                    </div>
                    <div class="main-body">
                        <p>Assurez-vous de fixer un prix approprié pour le service en fonction du volume de travail et d'effort, en tenant compte de la commission du site, et de définir un délai de livraison approprié pour compléter parfaitement le service.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
