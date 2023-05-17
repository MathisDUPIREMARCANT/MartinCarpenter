typedef struct coord{
    int x;
    int y;
}Coord;

typedef struct bridge {
    int size;
    int length;
    Coord* pos;
    int direction;
}Bridge;

typedef struct island{
    Coord pos;
    int number;
}Island;


void Free_game(Bridge* bridge, Island* island);
void From_C_to_Json(Bridge* liste_pont, Island* liste_ile, int nb_pont, int nb_ile, Coord posMax);
void From_C_to_Json_bridge(Bridge bridge);
void From_C_to_Json_island(Island island);
void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge);
void Place_island_on_map(char* Board, Coord posMax, Coord pos, int weight);
void Print_board(char* Board, Coord Taille);


int Map_gen(char* Board, Coord posMax, Coord pos, int Nb_island);
int Random(int min, int max);
int Ramification(char* Board, Coord pos, Coord posMax, int Direction, int* Nb_island, int length);
int Space_next_bridge(char* Board, Coord pos, Coord posMax, int Direction);
int* Table_copy(int* table, int length);

char* Init_board_Game(Coord pos);

Coord* Next_Coord(Coord* pos, int direction);

