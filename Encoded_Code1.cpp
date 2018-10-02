#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define A 9999
int B(int C);
char* D(long E);
int main(void) {

	char F[A];
	char G[((A - 1) * 8) + 1] = { NULL };
	char *H = { NULL };
	char I[9] = { NULL };
	char J[] = "==";
	char K[] = "00000";
	char L[] = "lksOm9BteESFLuDaNiUho1dwnRG0yc+jAKpXgYrH6xIQPW4vM7q32TbfZC8/5VJz";
	char M[] = "ig7kifWsutu9w3n2w214n3kgLoCHwTiojN==";
	long N[A];
	long O, P, Q, R;
	int S, T;

	scanf_s("%s", F, A);

	for (int i = 0; i < A; i++)
		N[i] = B(F[i]);

	for (int i = 0; i < A; i++) {
		if (N[i] != 0) {
			H = D(N[i]);
			strcat_s(G, H);
		}
	}

	memset(N, 0, A);
	S = 0;
	for (int i = 0; i < strlen(G); i += 6) {
		strncpy_s(I, G + i, 6);
		if (strlen(I) < 6) {
			T = 3 - (strlen(I) / 2);
			strncat_s(I, K, 6 - strlen(I));
		}
		O = atoi(I);
		R = 0;
		Q = 1;
		while (O != 0) {
			if (O % 10)
				R += Q;
			O /= 10;
			Q *= 2;
		}
		N[S] = R;
		S++;
	}

	memset(G, 0, ((A - 1) * 8) + 1);
	for (int i = 0; i < S; i++) {
		G[i] = L[N[i]];
	}

	for (int i = S; i < S + T; i++) {
		G[i] = '=';
	}
	printf("%s\n", G);

	if (!strcmp(G, M)) {
		printf("Correct!!!\n");
	}
	else {
		printf("it's not FLAG!!\n");
	}

	return 0;

}

int B(int C) {
	int U;
	int V = 0;
	int W = 1;
	while (C > 0) {
		U = C % 2;
		V += U*W;
		C = C / 2;
		W *= 10;
	}
	return V;
}

char* D(long E) {
	static char X[9] = { NULL };
	char Y[9] = { NULL };
	char Z[((A - 1) * 8) + 1] = { NULL };
			_itoa_s(E, X, 10);
			strcpy_s(Y, sizeof(X), X);
			memset(X, 0, 9);
			for (int i = 0; i < (8 - strlen(Y)); i++) {
				X[i] = '0';
			}
			strcat_s(X, Y);
	return X;
}