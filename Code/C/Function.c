int Init_boardGame(char* Board, int x, int y){
    for(int i = 0; i < (x*y); i++){
        *(Board + i) = "*";
    }
}

int Place_island(char* Board, int x, int y){
    
}


int Random_number(int maximum) {
    srand(time(0)); // initialiser le générateur de nombres aléatoires avec une graine basée sur le temps actuel
    return rand() % (maximum + 1); // renvoyer un nombre aléatoire entre 0 et maximum inclus
}