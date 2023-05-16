typedef struct coord{
    int x;
    int y;
}Coord;

typedef struct bridge {
    int size;
    int lenght;
    Coord pos;
    int direction;
}Bridge;

typedef struct island{
    Coord pos;
    int number;
}Island;

void Affichage_board(char* Board, Coord Taille);
void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge);
int Space_next_bridge(char* Board, Coord pos, Coord posMax);
int Random(int maximum);
char* Init_board_Game(Coord pos);
Coord* Next_Coord(Coord* pos, int direction);
