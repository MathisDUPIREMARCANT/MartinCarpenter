void Init_boardGame(char* Board, int x, int y){
    for(int i = 0; i < (x*y); i++){
        *(Board + i) = "*";
    }
}


int Random(int maximum) {
    srand(time(0)); // initialiser le générateur de nombres aléatoires avec une graine basée sur le temps actuel
    return rand() % (maximum + 1); // renvoyer un nombre aléatoire entre 0 et maximum inclus
}

int Place_bridge_on_map(char* Board, int Ymax, int x, int y, int type_bridge){
    if(type_bridge == 1){
        *(Board + Ymax*x + y) = '~';
    }
   
    if(type_bridge == 2){
        *(Board + Ymax*x + y) = '#';
    }
};

int Map_mading(char* Board, int Ymax, int Xmax, int x, int y,  int Nb_ile){
    *(Board + Ymax*x + y) = '1';
    int end = 0;
    while(end < Nb_ile){
        int Dpont = rand(3);
        if 
    }
}
