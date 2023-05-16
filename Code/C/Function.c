char * Init_boardGame(int x, int y){
    /*Initialize the board and fill it with '*' 
    Returns the pointer of the Board*/

    char* Board = malloc((x * y) * sizeof(char));
    for(int i = 0; i < (x*y); i++){
        *(Board + i) = "*";
    }
    return Board;
}

int Random(int maximum) {
    /*Returns a random number between 0 and maximum*/

    srand(time(0));
    return rand() % (maximum + 1);
}

int Place_bridge_on_map(char* Board, int Ymax, int x, int y, int type_bridge){
    /*Place a bridge on the board in (x,y)*/

    if(type_bridge == 1){
        *(Board + Ymax*x + y) = '~';
    }
   
    if(type_bridge == 2){
        *(Board + Ymax*x + y) = '#';
    }
};

int Space_next_bridge(char* Board, int x, int y){
    /*Returns a list of spaces available between position x,y and each side
    In the order (N,E,S,O)*/


}
