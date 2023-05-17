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

void Print_board(char* Board, Coord Taille);
void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge);
void Place_island_on_map(char* Board, Coord posMax, Coord pos, int weight);
int Map_gen(char* Board, Coord posMax, Coord pos, int Nb_island);
int Space_next_bridge(char* Board, Coord pos, Coord posMax, int Direction);
int* Table_copy(int* table, int length);
int Random(int maximum);
char* Init_board_Game(Coord pos);
Coord* Next_Coord(Coord* pos, int direction);

