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

int Space_next_bridge(char* Board, int x, int y, int Xmax, int Ymax){
    /*Returns a list of spaces available between position x,y and each side
    In the order (N,E,S,O)*/
    int N = 0; int E = 0;
    int S = 0; int O = 0;
    int xcopy = x;
    int ycopy = y;

    while(y>0 && (*(Board + Ymax*x + y) == "*")){
        N += 1;
        y -= 1;
    }

    x = xcopy;
    y = ycopy;

    while(x < Xmax && (*(Board + Ymax*x + y) == "*")){
        E += 1;
        x += 1;
    }

    x = xcopy;
    y = ycopy;

    while(y < Ymax && (*(Board + Ymax*x + y) == "*")){
        S += 1;
        y += 1;
    }

    x = xcopy;
    y = ycopy;

    while(x>0 && (*(Board + Ymax*x + y) == "*")){
        O += 1;
        x -= 1;
    }

    int space[4];
    space[0] = N;
    space[1] = E;
    space[2] = S;
    space[3] = O;

    return  space;
}

int Map_mading(char* Board, int Ymax, int Xmax, int x, int y, int Nb_ile) {
    (Board + Ymax*x + y) = '1';
    int end = 0; int Type_bridge = Random(1) + 1;
    while (end < Nb_ile) {
        int Dpont = Random(3);// v�rifie si c possible d'avanc� dans la direction 
        int* tab = Space_next_bridge(Board, x, y, Xmax, Ymax);
        int Type_bridge_suivant = Random(1) + 1;
        if ((tab + Dpont) >= ) {
            int lenght = Random(tab + Dpont);
            for (int i = 0; i <= lenght; i++) {
                //fonction victor
                Place_bridge_on_map(Board, Ymax, x, y, Type_bridge_suivant);
            }
        }
        else {
            break;
        }
        //fonction victor 
        (Board + Ymaxx + y) = Type_bridge_suivant + Type_bridge;
        Type_bridge = Type_bridge_suivant;
    }
}
